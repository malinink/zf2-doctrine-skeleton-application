<?php

return [
    'doctrine' => [
        'driver' => [
            'orm_entities' => [
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    dirname(__DIR__) . '/src/Common/Entity'
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Common\Entity' => 'orm_entities'
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'LazyServiceFactory'                          => 'Zend\ServiceManager\Proxy\LazyServiceFactoryFactory',
            'doctrine.cache.redis'                        => 'Common\Service\Factory\CacheRedisFactory',
            'Common\Logger'                               => 'Common\Service\Factory\LoggerFactory',
            'Common\Service\Manager\CommonServiceManager' => 'Common\Service\Factory\Manager\CommonServiceManagerFactory',
            'Common\Service\Manager\ModelServiceManager'  => 'Common\Service\Factory\Manager\ModelServiceManagerFactory',
        ],
        'invokables' => [
        ],
        'delegators' => [
            'Doctrine\ORM\EntityManager' => ['LazyServiceFactory'],
            'Common\Logger'              => ['LazyServiceFactory'],
        ],
        'aliases' => [
            'Common\EntityManager'        => 'Doctrine\ORM\EntityManager',
            'Common\CommonServiceManager' => 'Common\Service\Manager\CommonServiceManager',
            'Common\ModelServiceManager'  => 'Common\Service\Manager\ModelServiceManager',
        ],
    ],
    'lazy_services' => [
        'class_map' => [
            'Common\EntityManager' => 'Doctrine\ORM\EntityManager',
            'Common\Logger'        => 'Zend\Log\Logger',
        ],
    ],
];
