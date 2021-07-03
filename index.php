<?php
require_once __DIR__.'/vendor/autoload.php';
use app\core;
use app\core\Application;

echo "hello world";
$app = new Application();
$app->router->get('/', function(){
    return "Hello World";
});
$app->run();