<?php
use TYPO3\CMS\Core\Schema\Struct\SelectItem;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$contentTypeName = ExtensionUtility::registerPlugin(
    'Showcase',         // extension name
    'Show',            // plugin name
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.show.title',      // plugin title
    'showcase_icon',              // icon identifier
    'Showcase',              // group
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.show.description' // plugin description
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginShow.xml',
    $contentTypeName
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $contentTypeName,
    'after:subheader',
);
