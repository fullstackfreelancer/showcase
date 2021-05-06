<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
   'Showcase',
   'List',
   'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin_list.title',
   'showcase-list'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('showcase', 'Configuration/TypoScript', 'Showcase');

// plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['showcase_list'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_list',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginList.xml'
);
