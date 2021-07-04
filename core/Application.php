<?php

namespace app\core;

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
    }
    public function run() {
        echo $this->router->resolve();
    }
}