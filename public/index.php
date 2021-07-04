<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;
$app = new Application(dirname(__DIR__));
$app->router->get('/', [$app::$siteController, 'home']);
$app->router->get('/contact', [$app::$siteController,'contact']);
$app->router->get('/login', [$app::$authController, 'login']);
$app->router->get('/register', [$app::$authController, 'register']);
$app->router->post('/login',[$app::$authController, 'login']);
$app->router->post('/register', [$app::$authController, 'register']);
$app->router->post('/contact', [$app::$siteController, 'handleContact']);
$app->run();