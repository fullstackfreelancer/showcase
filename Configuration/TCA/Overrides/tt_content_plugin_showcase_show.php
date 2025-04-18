<?php
use TYPO3\CMS\Core\Schema\Struct\SelectItem;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$pluginSignature = 'show';
$extensionKey = 'showcase';

ExtensionUtility::registerPlugin(
    'showcase',         // extension name
    'show',            // plugin name
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.show.title',      // plugin title
    'showcase_icon',              // icon identifier
    'Showcase',              // group
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.show.description' // plugin description
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $pluginSignature,
    'after:subheader',
);

ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_show',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginShow.xml',
);
