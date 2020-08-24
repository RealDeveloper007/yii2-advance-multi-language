<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'en',
    'sourceLanguage' => 'en',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
     'modules' => [
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module', 
        ],
      ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
                'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 31536000,
                    'enableCaching' => false,
                ],
                'app*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 31536000,
                    'enableCaching' => false,
                ],
                'user*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 31536000,
                    'enableCaching' => false,
                ],
                'yii*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 31536000,
                    'enableCaching' => false,
                ],
                'database*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 31536000,
                    'enableCaching' => false,
                ],

            ],
        ],
    ],
];
