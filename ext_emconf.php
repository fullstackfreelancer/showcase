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
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.99-11.2.0',
        ],
        'conflicts' => [],
        'suggests' => [
            'bootstrap_package' => '11.0.3-11.0.99'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'SIMONKOEHLER\\Showcase\\' => 'Classes'
        ]
    ],
];
