<?php
namespace SIMONKOEHLER\Showcase\Domain\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use SIMONKOEHLER\Showcase\Domain\Model\Project;

class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository{

    private $dataMapper;

    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @param DataMapper $dataMapper
     */
    public function injectDataMapper(DataMapper $dataMapper){
        $this->dataMapper = $dataMapper;
    }

    public function initializeObject() {
        $querySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function getCategoriesFromRoot($root) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_category');
        $statement = $queryBuilder
            ->select('*')
            ->from('sys_category')
            ->orderBy('sorting')
            ->where(
              $queryBuilder->expr()->eq('parent', $queryBuilder->createNamedParameter($root, \PDO::PARAM_INT))
            )
            ->execute();
        $output = array();
        while ($row = $statement->fetch()) {
            array_push($output, $row);
        }
        return $output;
    }

    /**
     * Returns all matching records for the given list of uids and applies the uidList sorting for the result
     *
     * @param string $uidList
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByUids($uidList){
        $uids = GeneralUtility::intExplode(',', $uidList, true);
        if ($uidList === '' || count($uids) === 0) {
            return [];
        }

        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_showcase_domain_model_project');
        $rows = $queryBuilder
            ->select('*')
            ->from('tx_showcase_domain_model_project')
            ->where($queryBuilder->expr()->in('uid', $uids))
            ->add('orderBy', 'FIELD(tx_showcase_domain_model_project.uid,' . implode(',', $uids) . ')')
            ->execute()
            ->fetchAll();
            return $this->dataMapper->map(Project::class, $rows);
    }

    // Adds the assigned categories as a string for CSS classes to the project
    public function addCategoryStringToProjects($projects) {
        foreach ($projects as $project) {
            $string = '';
            $projectCategories = $project->getCategories();
            if($projectCategories){
                foreach ($project->getCategories() as $category) {
                    $string .= 'cat-'.$category->getUid().' ';
                }
            }
            else{
                $string = 'cat-none';
            }
            $project->setCategoriesString($string);
        }
        return $projects;
    }

}
