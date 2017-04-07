<?php
return [
    'name' => 'Ballanser',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            //'dateFormat' => 'Y-MM-dd',
            'datetimeFormat' => 'Y-MM-dd HH:mm',
            'timeFormat' => 'HH:mm',
            'defaultTimeZone' => 'Europe/Moscow',
            'currencyCode' => 'RUR',
        ]
    ],
];
