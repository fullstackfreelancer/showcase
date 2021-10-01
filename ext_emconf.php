<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Showcase',
    'description' => 'Create beautiful showcases and portfolios',
    'category' => 'plugin',
    'author' => 'Simon Köhler',
    'author_email' => 'info@simon-koehler.com',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.2.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.4.0',
        ],
        'conflicts' => [],
        'suggests' => [
            'bootstrap_package' => '11.0.3-12.0.99'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'SIMONKOEHLER\\Showcase\\' => 'Classes'
        ]
    ],
];
