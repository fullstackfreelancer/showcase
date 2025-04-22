<?php
namespace SIMONKOEHLER\Showcase\Domain\Repository;

use SIMONKOEHLER\Showcase\Domain\Model\Category;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    public function findChildren($parent)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->setOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        return $query->matching(
            $query->logicalAnd(
                $query->equals('parentcategory', (int)$parent)
            )
        )->execute();
    }
}
?>
