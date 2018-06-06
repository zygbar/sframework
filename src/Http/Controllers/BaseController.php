<?php
/**
 * Base controller logic
 */

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Twig_Environment;

class BaseController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * BaseController constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param ResponseInterface $response
     * @param string $view
     * @param array $arguments
     * @return ResponseInterface
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render(ResponseInterface $response, string $view, array $arguments)
    {
        $response->getBody()->write(
            $this->twig->render($view . '.twig', $arguments)
        );

        return $response;
    }
}