<?php
namespace SIMONKOEHLER\Showcase\Controller;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;

class ProjectController extends ActionController
{

    /**
     * Inject the project repository
     *
     * @param \SIMONKOEHLER\Showcase\Domain\Repository\ProjectRepository $projectRepository
     */
    public function injectProjectRepository(\SIMONKOEHLER\Showcase\Domain\Repository\ProjectRepository $projectRepository)
    {
       $this->projectRepository = $projectRepository;
    }

    /**
     * Index action
     *
     * @return string
     */
    public function listAction()
    {
        $pageUid = (int)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');

        if($this->settings['recordstorage']){
            $projects = $this->projectRepository->findByPid($this->settings['recordstorage']);
            $categories = $this->projectRepository->getCategoriesFromRoot($this->settings['categoryroot']);
            foreach ($projects as $project) {
                $string = '';
                $projectCategories = $project->getCategories();
                if($projectCategories){
                    foreach ($project->getCategories() as $category) {
                        $string .= 'cat-'.$category->getUid().' ';
                    }
                    $project->setCategoriesString($string);
                }
            }
            $this->view->assign('categories',$categories);
            $this->view->assign('projects',$projects);
            $this->view->assign('settings',$this->settings);
            $this->view->assign('pageUid',$pageUid);
        }
        else{
            $this->addFlashMessage(
               'Missing recordStorage in your plugin!',
               $messageTitle = 'Note',
               $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::OK,
               $storeInSession = FALSE
            );
        }

    }

    /**
     * Action modal
     *
     * @return string
     */
    public function modalAction(\SIMONKOEHLER\Showcase\Domain\Model\Project $project)
    {
        $this->view->assign('project',$project);
        $this->view->assign('settings',$this->settings);
    }

    /**
     * Action show
     *
     * @return string
     */
    public function showAction()
    {

        if($this->request->hasArgument('project')){
            $projectRender = $this->projectRepository->findByUid($this->request->getArgument('project'));
        }
        else{
            if($this->settings['singlerecord']){
                $projectRender = $this->projectRepository->findByUid($this->settings['singlerecord']);
            }
            else{
                $this->addFlashMessage(
                   'No single record given',
                   $messageTitle = 'Note',
                   $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::OK,
                   $storeInSession = FALSE
                );
            }
        }

        // Set page title
        $titleProvider = GeneralUtility::makeInstance(\SIMONKOEHLER\Showcase\PageTitle\TitleProvider::class);
        $titleProvider->setTitle($projectRender->getSeotitle() ?: $projectRender->getTitle());

        // Set meta description
        $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('description');
        $metaTagManager->addProperty('description', $projectRender->getSeodescription());

        $this->view->assign('project',$projectRender);
        $this->view->assign('settings',$this->settings);
    }

    /**
     * Index action
     *
     * @return string
     */
    public function sliderAction()
    {
        if($this->settings['recordstorage']){
            $projects = $this->projectRepository->findByPid($this->settings['recordstorage']);
        }
        else{
            $this->addFlashMessage(
               'Missing recordStorage in your plugin!',
               $messageTitle = 'Note',
               $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::OK,
               $storeInSession = FALSE
            );
        }

        $this->view->assign('projects',$projects);
        $this->view->assign('settings',$this->settings);
    }

}
