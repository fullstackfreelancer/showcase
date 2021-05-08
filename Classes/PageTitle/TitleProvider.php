<?php
declare(strict_types = 1);
namespace SIMONKOEHLER\Showcase\PageTitle;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

class TitleProvider extends AbstractPageTitleProvider{
    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}
