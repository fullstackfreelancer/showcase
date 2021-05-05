<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Showcase',
    'description' => 'Create beautiful showcases and portfolios',
    'category' => 'plugin',
    'author' => 'Simon Köhler',
    'author_email' => 'info@simon-koehler.com',
    'state' => 'beta',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.99-10.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'SIMONKOEHLER\\Showcase\\' => 'Classes'
        ]
    ],
];
