<?php
namespace SIMONKOEHLER\Showcase\Domain\Model;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;

class Url extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title;

    /**
     * url
     *
     * @var string
     */
    protected $url;

    /**
     * target
     *
     * @var string
     */
    protected $target;

    /**
     * hoverTitle
     *
     * @var string
     */
    protected $hoverTitle;



    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Returns the url
     *
     * @return string $url
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Returns the target
     *
     * @return string $target
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * Returns the hoverTitle
     *
     * @return string $hoverTitle
     */
    public function getHoverTitle() {
        return $this->hoverTitle;
    }

}
