<?php
namespace SIMONKOEHLER\Showcase\Domain\Model;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;

class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
    * categories
    *
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
    */
    protected $categories;

    /**
    * urls
    *
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SIMONKOEHLER\Showcase\Domain\Model\Url>
    */
    protected $urls;

    /**
    * related
    *
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SIMONKOEHLER\Showcase\Domain\Model\Project>
    */
    protected $related;

    /**
     * backgroundClass
     *
     * @var string
     */
    protected $backgroundClass;

    /**
     * listLayout
     *
     * @var string
     */
    protected $listLayout;

    /**
     * title
     *
     * @var string
     */
    protected $title;

    /**
     * description
     *
     * @var string
     */
    protected $description;

    /**
     * teaser
     *
     * @var string
     */
    protected $teaser;

    /**
     * seotitle
     *
     * @var string
     */
    protected $seotitle = '';

        /**
     * seodescription
     *
     * @var string
     */
    protected $seodescription = '';

    /**
     * media
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @Cascade remove
     */
    protected $media = null;


    /**
     * previewImage
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @Cascade remove
     */
    protected $previewImage = null;


    /**
     * Returns the media
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Returns the previewImage
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $previewImage
     */
    public function getPreviewImage()
    {
        return $this->previewImage;
    }

    /**
     * Returns the backgroundClass
     *
     * @return string
     */
    public function getBackgroundClass()
    {
        return $this->backgroundClass;
    }

    /**
     * Returns the listLayout
     *
     * @return string
     */
    public function getListLayout()
    {
        return $this->listLayout;
    }

    /**
     * Returns the header
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the teaser
     *
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
    * Adds a Category
    *
    * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
    * @return void
    */
    public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category) {
        $this->categories->attach($category);
    }

    /**
    * Removes a Category
    *
    * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The Category to be removed
    * @return void
    */
    public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove) {
        $this->categories->detach($categoryToRemove);
    }

    /**
    * Returns the categories
    *
    * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
    */
    public function getCategories() {
        return $this->categories;
    }

    /**
    * Sets the categories
    *
    * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
    * @return void
    */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
        $this->categories = $categories;
    }

    /**
     * Returns the seotitle
     *
     * @return string $seotitle
     */
    public function getSeotitle() {
        return $this->seotitle;
    }

    /**
     * Sets the seotitle
     *
     * @param string $seotitle
     * @return void
     */
    public function setSeotitle($seotitle) {
        $this->seotitle = $seotitle;
    }

    /**
     * Returns the seodescription
     *
     * @return string $seodescription
     */
    public function getSeodescription() {
        return $this->seodescription;
    }

    /**
     * Sets the seodescription
     *
     * @param string $seodescription
     * @return void
     */
    public function setSeodescription($seodescription) {
        $this->seodescription = $seodescription;
    }

    /**
    * Returns the urls
    *
    * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SIMONKOEHLER\Showcase\Domain\Model\Url> $urls
    */
    public function getUrls() {
        return $this->urls;
    }

    /**
    * Returns the related projects
    *
    * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SIMONKOEHLER\Showcase\Domain\Model\Project> $related
    */
    public function getRelated() {
        return $this->related;
    }

}
