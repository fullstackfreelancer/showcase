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
        '1' => ['showitem' => 'l10n_parent, l10n_diffsource, urls, title, teaser, description, preview_image, --div--;LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tab.media, media, --div--;LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tab.layout, list_layout,--div--;LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tab.seo, seotitle, seodescription, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                    ['Hover Title', 'hover-title']
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
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'seodescription' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.seodescription',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'enableRichtext' => false,
                'default' => 'Nothing entered here..!'
            ],
        ],
        'preview_image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.preview_image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'preview_image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'maxitems' => 1
                ]
            ),
        ],
        'media' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_project.media',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'media',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                    'maxitems' => 50
                ]
            ),
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
            'label' => 'URLs',
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
    ],
];
