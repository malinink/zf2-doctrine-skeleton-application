<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host'      => 'localhost',
                    'port'      => '3306',
                    'charset'   => 'utf8',
                ],
                'doctrine_type_mappings' => [
                    'enum' => 'string',
                ],
            ],
        ],
    ],
];
