<?php
namespace SIMONKOEHLER\Showcase\Domain\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository{

    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

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

}
