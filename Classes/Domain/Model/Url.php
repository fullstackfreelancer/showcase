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
     * urlTarget
     *
     * @var string
     */
    protected $urlTarget;

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
     * Returns the urlTarget
     *
     * @return string $urlTarget
     */
    public function getUrlTarget() {
        return $this->urlTarget;
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
