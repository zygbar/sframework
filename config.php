<?php

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\DriverManager;

/**
 * Dependency configuration file
 */
return [
    // Setup the request/response
    'request' => function() {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    },

    'response' => new Response(),
    'emitter'  => new SapiEmitter(),

    // Add Twig to the framework
    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
        return new Twig_Environment($loader);
    },

    // Setup DBAL
    QueryBuilder::class => function () {
        $options = [
            'dbname'   => 'sframework',
            'user'     => 'root',
            'password' => 'root',
            'host'     => 'localhost',
            'driver'   => 'pdo_mysql',
        ];

        $connection = DriverManager::getConnection($options);
        return $connection->createQueryBuilder();
    },
];