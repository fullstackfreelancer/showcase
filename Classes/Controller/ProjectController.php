<?php
namespace SIMONKOEHLER\Showcase\Controller;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
        $projects = $this->projectRepository->findAll();
        $categories = $this->projectRepository->getCategoriesFromRoot($this->settings['categories']['root']);
        $this->view->assign('categories',$categories);
        $this->view->assign('projects',$projects);
        $this->view->assign('settings',$this->settings);
        $this->view->assign('pageUid',$pageUid);
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
                   $storeInSession = TRUE
                );
            }
        }

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
        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects',$projects);
        $this->view->assign('settings',$this->settings);
    }

}
