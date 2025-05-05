<?php
namespace SIMONKOEHLER\Showcase\Domain\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use SIMONKOEHLER\Showcase\Domain\Model\Project;

class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository{

    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    public function initializeObject() {
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function findByUids($uidList){
        $uids = GeneralUtility::intExplode(',', $uidList, true);
        $query = $this->createQuery();
        $query->matching($query->in('uid', $uids));
        $query->setOrderings([
            'sorting' => QueryInterface::ORDER_ASCENDING
        ]);
        return $query->execute();
    }

    public function getFromStorage($pid){
        $query = $this->createQuery();
        $query = $query->matching($query->equals('pid', $pid));
        $query->setOrderings([
            'sorting' => QueryInterface::ORDER_ASCENDING
        ]);
        return $query->execute();
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
