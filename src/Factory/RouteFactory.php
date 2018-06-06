<?php
/**
 * Router factory
 */

namespace App\Factory;

use App\Routes;
use DI\Container;
use League\Route\RouteCollection;

class RouteFactory
{
    /**
     * @param Container $container
     * @return RouteCollection
     */
    public static function build(Container $container) : RouteCollection
    {
        $route = new RouteCollection($container);

        Routes::routes($route);

        return $route;
    }
}