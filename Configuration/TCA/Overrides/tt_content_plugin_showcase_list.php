<?php
use TYPO3\CMS\Core\Schema\Struct\SelectItem;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$pluginSignature = 'list';
$extensionKey = 'showcase';

ExtensionUtility::registerPlugin(
    'showcase',         // extension name
    'list',            // plugin name
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.list.title',      // plugin title
    'showcase_icon',              // icon identifier
    'Showcase',              // group
    'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.list.description' // plugin description
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $pluginSignature,
    'after:subheader',
);

ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_list',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginList.xml',
);
