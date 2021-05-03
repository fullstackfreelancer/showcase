<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Showcase',
            'List',
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'list,show',
            ],
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'list,show',
            ]
        );
    }
);
