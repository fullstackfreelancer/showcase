<?php
use TYPO3\CMS\Core\Schema\Struct\SelectItem;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$contentTypeName = ExtensionUtility::registerPlugin(
    'Showcase',         // extension name
    'Slider',            // plugin name
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.slider.title',      // plugin title
    'showcase_icon',              // icon identifier
    'Showcase',              // group
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.slider.description' // plugin description
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginSlider.xml',
    $contentTypeName
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $contentTypeName,
    'after:subheader',
);
