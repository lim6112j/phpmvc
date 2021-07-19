<?php
ini_set('display_errors',1);
error_reporting(E_ERROR);
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\DefaultController;
use app\core\Application;
use app\middlewares\AuthMiddleware;

$app = new Application(dirname(__DIR__));
// global middleware : APP 전체에 적용.
//$app->useMiddleware(AuthMiddleware::class);
// routes
$app->router->get('/', [DefaultController::class, 'home'],[AuthMiddleware::class]);
$app->router->get('/index', [DefaultController::class, 'home'],[AuthMiddleware::class]);
$app->router->get('/index.php',[DefaultController::class, 'home'],[AuthMiddleware::class]);

$app->run();