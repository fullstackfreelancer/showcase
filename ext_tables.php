<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_showcase_domain_model_project');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_showcase_domain_model_url');

// Add an extra categories selection field to the pages table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
   'showcase',
   'tx_showcase_domain_model_project',
   // Do not use the default field name ("categories") for pages, tt_content, sys_file_metadata, which is already used
   'categories',
   array(
      // Set a custom label
      'label' => 'Categories',
      // This field should not be an exclude-field
      'exclude' => FALSE,
      // string (keyword), see TCA reference for details
      'l10n_mode' => 'exclude',
      // list of keywords, see TCA reference for details
      'l10n_display' => 'hideDiff',
   )
);

// Add TSConfig to the Backend
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    mod.web_layout.tt_content.preview.list.showcase_showcase = EXT:showcase/Resources/Private/Templates/Preview/Showcase.html
');

// Add CSS to the Backend
$GLOBALS['TBE_STYLES']['skins']['showcase'] = [];
$GLOBALS['TBE_STYLES']['skins']['showcase']['name'] = 'showcase';
$GLOBALS['TBE_STYLES']['skins']['showcase']['stylesheetDirectories'] = [
    'theme' => 'EXT:showcase/Resources/Public/Css/Backend'
];

// Add JavaScript to the Backend
$renderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
$renderer->addJsFile('EXT:showcase/Resources/Public/Js/ExtensionFeedback.js', 'text/javascript', false, false, '', true,  '|', false, '');
