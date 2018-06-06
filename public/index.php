<?php

use DI\ContainerBuilder;
use App\Factory\RouteFactory;

/**
 * Load composer
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Initialize container
 */
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/../config.php');

$container        = $containerBuilder->build();
$route            = RouteFactory::build($container);

$response         = $route->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);