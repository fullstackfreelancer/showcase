<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Showcase',
    'description' => 'Showcase is a versatile tool designed for creating dynamic portfolios, engaging galleries, and impressive presentations.',
    'category' => 'plugin',
    'author' => 'Simon Köhler',
    'author_email' => 'simonkoehler1978@gmail.com',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '3.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [
            'bootstrap_package' => '13.0.2-14.0.99'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'SIMONKOEHLER\\Showcase\\' => 'Classes'
        ]
    ],
];
