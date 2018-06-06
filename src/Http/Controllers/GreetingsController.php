<?php
/**
 * Greetings controller
 */

namespace App\Http\Controllers;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GreetingsController extends BaseController
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $arguments
     * @return ResponseInterface
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $arguments
    ) : ResponseInterface
    {
        return $this->render($response, 'home', $arguments);
    }
}