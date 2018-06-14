<?php
/**
 * Greetings controller
 */

namespace App\Http\Controllers;


use App\Users\UserRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Twig_Environment;
use Zend\Diactoros\Response\RedirectResponse;

class GreetingsController extends BaseController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * GreetingsController constructor.
     * @param Twig_Environment $twig
     * @param UserRepository $userRepository
     */
    public function __construct(Twig_Environment $twig, UserRepository $userRepository)
    {
        parent::__construct($twig);
        $this->userRepository = $userRepository;
    }

    /**
     * Index route
     *
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
        $otherUsers = $this->userRepository->getAll();
        $users      = array_merge($arguments, ['users' => $otherUsers]);

        return $this->render($response, 'home', $users);
    }

    public function store(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $arguments
    ) : ResponseInterface
    {
        $this->userRepository->add($arguments['name']);

        return new RedirectResponse('/hello/' . $arguments['name'], 301);
    }
}