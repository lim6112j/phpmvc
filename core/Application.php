<?php

namespace app\core;

use app\controllers\AuthController;
use app\controllers\SiteController;

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
    public static SiteController $siteController;
    public static AuthController $authController;
    public Controller $controller;
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
        self::$siteController = new SiteController();
        self::$authController = new AuthController();
    }
    public function run() {
        echo $this->router->resolve();
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