<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
   'Showcase',
   'Showcase',
   'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.title',
   'showcase'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('showcase', 'Configuration/TypoScript', 'Showcase');

// plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['showcase_showcase'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_showcase',
    'FILE:EXT:showcase/Configuration/FlexForms/Plugin.xml'
);
