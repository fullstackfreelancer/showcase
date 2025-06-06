<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_url',
        'label' => 'title',
        'label_alt' => 'url',
        'label_alt_force' => 1,
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'iconfile' => 'EXT:showcase/Resources/Public/Icons/showcase.svg',
        'security' => [
            'ignorePageTypeRestriction' => true
        ]
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, title, url, url_target, starttime, endtime',
    ],
    'types' => [
        '1' => ['showitem' => 'l10n_parent, l10n_diffsource, title, url, url_target, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes' =>[

    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
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
                'foreign_table' => 'tx_showcase_domain_model_url',
                'foreign_table_where' => 'AND tx_showcase_domain_model_url.pid=###CURRENT_PID### AND tx_showcase_domain_model_url.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_url.hidden',
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
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_url.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_url.url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'url,required'
            ],
        ],
        'url_target' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_url.url_target',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'valuePicker' => [
                    'items' => [
                        ['_blank', '_blank'],
                        ['_parent', '_parent'],
                        ['_self', '_self'],
                    ],
                ],
                'default' => '_blank'
            ],
        ],
        'hover_title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:showcase/Resources/Private/Language/locallang_db.xlf:tx_showcase_domain_model_url.hover_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    ],
];
