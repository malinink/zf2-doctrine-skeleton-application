<?php

return [
    'service_manager' => [
        'factories' => [
            'translator'         => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ],
    ],
    'translator' => [
        'locale' => 'ru_RU',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => dirname(dirname(__DIR__)) . '/module/Application/language',
                'pattern'  => '%s.mo',
            ],
            [
                'type'        => 'phpArray',
                'base_dir'    => dirname(dirname(__DIR__)) . '/vendor/zendframework/zendframework/resources/languages',
                'pattern'     => '/%s/Zend_Validate.php',
                'text_domain' => 'default',
            ],
        ],
        'plural_rules' => [
            'ru' => 'nplurals=3; plural=(n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2)',
            'en' => 'nplurals=2; plural=(n != 1)',
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout' => dirname(dirname(__DIR__)) . '/module/Application/view/layout/layout.phtml',
            'error/404'     => dirname(dirname(__DIR__)) . '/module/Application/view/error/404.phtml',
            'error/index'   => dirname(dirname(__DIR__)) . '/module/Application/view/error/index.phtml',
        ],
    ],
    'logger' => [
        'path' => dirname(dirname(__DIR__)) . '/data/log/',
    ],
];
