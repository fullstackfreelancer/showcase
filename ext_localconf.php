<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {

        ExtensionUtility::configurePlugin(
            'Showcase',
            'List',
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'list',
            ],
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => '',
            ],
        );

        ExtensionUtility::configurePlugin(
            'Showcase',
            'Slider',
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'slider',
            ],
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => '',
            ],
        );

        ExtensionUtility::configurePlugin(
            'Showcase',
            'Show',
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'show,modal',
            ],
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'show,modal',
            ],
        );

        $icons = [
            'showcase_icon' => 'EXT:showcase/ext_icon.svg',
        ];

        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => $path]
            );
        }

        $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'][] = 'tx_showcase_show[project]';

    }
);
