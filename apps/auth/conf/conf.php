<?php


return array(
    'db' => array(
        'configLoader' => 'Annotation',
        'kancolle' => array(
            'driver' => 'pdo_pgsql',
            'host' => 'localhost',
            'dbname' => 'kancolle',
            'user' => 'master',
            'password' => '0',
            'charset' => 'UTF8',
        ),
    ),
);