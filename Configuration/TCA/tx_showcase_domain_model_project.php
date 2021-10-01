<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project',
        'label' => 'title',
        'label_alt' => 'seotitle',
        'label_alt_force' => 1,
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'iconfile' => 'EXT:showcase/ext_icon.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, title, description, media, starttime, endtime',
    ],
    'types' => [
        '1' => ['showitem' => 'l10n_parent, l10n_diffsource, urls, title, slug, teaser, description, preview_image, related, --div--;LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tab.media, media, --div--;LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tab.layout, list_layout,--div--;LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tab.seo, seotitle, seodescription, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes' =>[

    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_showcase_domain_model_project',
                'foreign_table_where' => 'AND tx_showcase_domain_model_project.pid=###CURRENT_PID### AND tx_showcase_domain_model_project.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'list_layout' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.list_layout',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 'card-img-top',
                'items' => [
                    ['Card Image Top', 'card-img-top'],
                    ['Card Image Bottom', 'card-img-bottom'],
                    ['Card Image Left', 'card-img-left'],
                    ['Card Image Right', 'card-img-right'],
                    ['Hover Title', 'card-hover']
                ],
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'slug' => [
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.slug',
            'exclude' => 1,
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['title'],
                    'fieldSeparator' => '/',
                    'prefixParentPageSlug' => false,
                    'replacements' => [
                        '/' => '',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
            ],
        ],
        'teaser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.teaser',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'enableRichtext' => false,
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'enableRichtext' => true,
                'default' => ''
            ],
        ],
        'seotitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.seotitle',
            'description' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.seotitle.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'max' => 80
            ],
        ],
        'seodescription' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.seodescription',
            'description' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.seodescription.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'enableRichtext' => false,
                'max' => 160
            ],
        ],
        'preview_image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.preview_image',
            'description' => 'The preview image is shown in list views and sliders',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'preview_image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    title,
                                    alternative,
                                    crop,
                                    --palette--;;filePalette
                                '
                            ]
                        ],
                    ],
                    'minitems' => 0,
                    'maxitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'media' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.media',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'media',
                [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'Add File',
                        'showPossibleLocalizationRecords' => true,
                        'showRemovedLocalizationRecords' => true,
                        'showAllLocalizationLink' => true,
                        'showSynchronizationLink' => true
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_UNKNOWN => [
                                'showitem' => '
                                    --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                    --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                    --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;audioOverlayPalette,
                                    --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                    --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;videoOverlayPalette,
                                    --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                    --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
                            ]
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext']
            )
        ],
        'background_class' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:background_class',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 'bg-gray-light',
                'items' => [
                    ['LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:background_class.gray_light', 'bg-gray-light'],
                    ['LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:background_class.gray_medium', 'bg-gray-medium'],
                    ['LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:background_class.gray_dark', 'bg-gray-dark'],
                ],
            ],
        ],
        'urls' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.urls',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_showcase_domain_model_url',
                'foreign_field' => 'parent_record',
                'maxitems' => 10,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'related' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.related_projects',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_showcase_domain_model_project',
                'foreign_table' => 'tx_showcase_domain_model_project',
                'MM_opposite_field' => 'related_from',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'MM' => 'tx_showcase_domain_model_project_related_mm',
                'suggestOptions' => [
                    'default' => [
                        'suggestOptions' => true,
                        'addWhere' => ' AND tx_showcase_domain_model_project.uid != ###THIS_UID###'
                    ]
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
    ],
];
