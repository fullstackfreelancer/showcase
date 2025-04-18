<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
   'Showcase',
   'List',
   'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.list.title',
   'showcase'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
   'Showcase',
   'Slider',
   'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.slider.title',
   'showcase'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
   'Showcase',
   'Show',
   'LLL:EXT:showcase/Resources/Private/Language/locallang.xlf:plugin.show.title',
   'showcase'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['showcase_list'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_list',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginList.xml'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['showcase_slider'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_slider',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginSlider.xml'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['showcase_show'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'showcase_show',
    'FILE:EXT:showcase/Configuration/FlexForms/PluginShow.xml'
);

// Hide pages and recursive fields fields for all plugins
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['showcase_list'] = 'recursive,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['showcase_slider'] = 'recursive,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['showcase_show'] = 'recursive,pages';
