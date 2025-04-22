<?php

declare(strict_types=1);

use SIMONKOEHLER\Showcase\Domain\Model\Category;

return [
    Category::class => [
        'tableName' => 'sys_category',
        'properties' => [
            'parentcategory' => [
                'fieldName' => 'parent',
            ],
        ],
    ],
];
