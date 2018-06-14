<?php
/**
 * Define routes here
 */

namespace App;

use League\Route\RouteCollectionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Http\Controllers\GreetingsController;

class Routes
{
    /**
     * @param RouteCollectionInterface $route
     * @return RouteCollectionInterface
     */
    public static function routes(RouteCollectionInterface $route) : RouteCollectionInterface
    {
        $route->get('/', function(ServerRequestInterface $request, ResponseInterface $response) {
                $response->getBody()->write('<h1>Hello, world sdfsdfs</h1>');
                return $response;
        });

        $route->get('/test', function(ServerRequestInterface $request, ResponseInterface $response) {
            $response->getBody()->write('<h1>Test</h1>');
            return $response;
        });

        $route->get('/hello/{name}', GreetingsController::class . '::index');
        $route->get('/add/{name}', GreetingsController::class . '::store');


        return $route;
    }
}