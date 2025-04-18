<?php
$GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['showcase'] = 'EXT:showcase/Resources/Public/Css/Backend';

// Add JavaScript to the Backend
$renderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
$renderer->addJsFile('EXT:showcase/Resources/Public/Js/ExtensionFeedback.js', 'text/javascript', false, false, '', true,  '|', false, '');
