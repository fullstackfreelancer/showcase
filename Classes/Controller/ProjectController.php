<?php
namespace SIMONKOEHLER\Showcase\Controller;
use SIMONKOEHLER\Showcase\Domain\Repository\ProjectRepository;
use SIMONKOEHLER\Showcase\Domain\Repository\CategoryRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;

class ProjectController extends ActionController
{

    protected ProjectRepository $projectRepository;
    protected CategoryRepository $categoryRepository;

    public function __construct(ProjectRepository $projectRepository, CategoryRepository $categoryRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Index action
     *
     * @return string
     */
    public function listAction(): ResponseInterface
    {
        //$pageUid = (int)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
        $pageUid = $this->request->getParsedBody()['id'] ?? $this->request->getQueryParams()['id'] ?? null;

        switch ($this->settings['recordsource']) {

            // Selected projects mode / get selected projects from a list
            case 'selected':

                $projects = $this->projectRepository->findByUids($this->settings['recordlist']);
                $projectsFinal = $this->projectRepository->addCategoryStringToProjects($projects);
                $this->view->assign('projects',$projectsFinal);

            break;

            // Storage folder mode / get projects from specific folder
            case 'storage':

                if($this->settings['recordstorage']){
                    $projects = $this->projectRepository->getFromStorage($this->settings['recordstorage']);
                    $projectsFinal = $this->projectRepository->addCategoryStringToProjects($projects);
                    $this->view->assign('projects',$projectsFinal);
                }
                else{
                    $this->addFlashMessage(
                        'Missing record storage pid in your plugin settings!',
                        $messageTitle = 'Note',
                        $severity = \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::OK,
                        $storeInSession = FALSE
                    );
                }

            break;

            default:
                $this->addFlashMessage(
                    'No record source selected in your plugin settings!',
                    $messageTitle = 'Oops!',
                    $severity = \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::WARNING,
                    $storeInSession = FALSE
                );
            break;
        }

        if($this->settings['showcategorymenu']){
            //$categories = $this->projectRepository->getCategoriesFromRoot($this->settings['categoryroot']);
            $categories = $this->categoryRepository->findChildren($this->settings['showcategorymenu']);
            $this->view->assign('categories',$categories);
        }

        $this->view->assign('settings',$this->settings);
        $this->view->assign('pageUid',$pageUid);
        return $this->htmlResponse();
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
    public function showAction(): ResponseInterface
    {
        $project = null;

        if($this->request->hasArgument('project')){
            $project = $this->projectRepository->findByUid($this->request->getArgument('project'));
        }
        else{
            if(isset($this->settings['singlerecord']) && $this->settings['singlerecord'] > 0){
                $project = $this->projectRepository->findByUid($this->settings['singlerecord']);
            }
            else{
                $this->addFlashMessage(
                   'No single record uid given',
                   $messageTitle = 'Note',
                   $severity = \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::OK,
                   $storeInSession = FALSE
                );
            }
        }

        if($project !== null){
            // Set page title
            $titleProvider = GeneralUtility::makeInstance(\SIMONKOEHLER\Showcase\PageTitle\TitleProvider::class);
            $titleProvider->setTitle($project->getSeotitle() ?: $project->getTitle());

            // Set meta description
            $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('description');
            //$metaTagManager->addProperty('description', $project->getSeodescription());

            $this->view->assign('project',$project);
        }

        $this->view->assign('settings',$this->settings);
        return $this->htmlResponse();
    }

    /**
     * Index action
     *
     * @return string
     */
    public function sliderAction(): ResponseInterface
    {
        $contentObj = $this->request->getAttribute('currentContentObject');
        $this->view->assign('content_element_uid',$contentObj->data['uid']);
        switch ($this->settings['recordsource']) {

            // Selected projects mode / get selected projects from a list
            case 'selected':

                $projects = $this->projectRepository->findByUids($this->settings['recordlist']);
                $projectsFinal = $this->projectRepository->addCategoryStringToProjects($projects);
                $this->view->assign('projects',$projectsFinal);

            break;

            // Storage folder mode / get projects from specific folder
            case 'storage':

                if($this->settings['recordstorage']){
                    $projects = $this->projectRepository->getFromStorage($this->settings['recordstorage']);
                    $projectsFinal = $this->projectRepository->addCategoryStringToProjects($projects);
                    $this->view->assign('projects',$projectsFinal);
                }
                else{
                    $this->addFlashMessage(
                       'Missing record storage pid in your plugin settings!',
                       $messageTitle = 'Note',
                       $severity = \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::OK,
                       $storeInSession = FALSE
                    );
                }

            break;

            default:
                $this->addFlashMessage(
                    'No record source selected in your plugin settings!',
                    $messageTitle = 'Oops!',
                    $severity = \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::OK,
                    $storeInSession = FALSE
                );
            break;
        }

        //$this->view->assign('projects',$projects);
        $this->view->assign('settings',$this->settings);
        return $this->htmlResponse();
    }

}
