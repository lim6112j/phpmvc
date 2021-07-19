<?php

namespace app\core;

/**
 * Class Application
 * @package app\core
 */
class Application {
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    private Controller $controller;
    public array $appMiddlewares=[];
    /**
     * Application constructor.
     * @param $rootPath
     */
    public function __construct($rootPath) {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }
    public function run() {
        echo $this->router->resolve();
    }

    public function useMiddleware(string $middleware)
    {
        $this->appMiddlewares[] = $middleware;
    }
    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}