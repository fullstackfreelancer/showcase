<?php
$defaultCropSettings = [
    'title' => 'Default',
    'allowedAspectRatios' => [
        '16:9' => [
            'title' => 'LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:ratio.16_9',
            'value' => 16 / 9
        ],
        '4:3' => [
            'title' => 'LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:ratio.4_3',
            'value' => 4 / 3
        ],
        '1:1' => [
            'title' => 'LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:ratio.1_1',
            'value' => 1.0
        ],
        'NaN' => [
            'title' => 'LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:ratio.free',
            'value' => 0.0
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];

$largeCropSettings = $defaultCropSettings;
$largeCropSettings['title'] = 'Large';
$mediumCropSettings = $defaultCropSettings;
$mediumCropSettings['title'] = 'Medium';
$smallCropSettings = $defaultCropSettings;
$smallCropSettings['title'] = 'Small';
$extrasmallCropSettings = $defaultCropSettings;
$extrasmallCropSettings['title'] = 'Extrasmall';

$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['preview_image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['preview_image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['large'] = $largeCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['preview_image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['medium'] = $mediumCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['preview_image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['small'] = $smallCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['preview_image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['extrasmall'] = $extrasmallCropSettings;

$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['large'] = $largeCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['medium'] = $mediumCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['small'] = $smallCropSettings;
$GLOBALS['TCA']['tx_showcase_domain_model_project']['types']['1']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['extrasmall'] = $extrasmallCropSettings;
