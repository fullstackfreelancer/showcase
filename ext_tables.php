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
