<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
   'Showcase',
   'List',
   'Projects List',
   'EXT:showcase/Resources/Public/Icons/ContentElements/logo.svg'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('showcase', 'Configuration/TypoScript', 'Showcase');
