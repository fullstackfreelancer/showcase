<?php

// Add TSConfig to the Backend
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    mod.web_layout.tt_content.preview.list.showcase_list = EXT:showcase/Resources/Private/Templates/Preview/Showcase.html
    mod.web_layout.tt_content.preview.list.showcase_slider = EXT:showcase/Resources/Private/Templates/Preview/Showcase.html
    mod.web_layout.tt_content.preview.list.showcase_show = EXT:showcase/Resources/Private/Templates/Preview/Showcase.html
    mod.web_list.table.tx_showcase_domain_model_url.hideTable = 1
');

$GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['showcase'] = 'EXT:showcase/Resources/Public/Css/Backend';

// Add JavaScript to the Backend
$renderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
$renderer->addJsFile('EXT:showcase/Resources/Public/Js/ExtensionFeedback.js', 'text/javascript', false, false, '', true,  '|', false, '');
