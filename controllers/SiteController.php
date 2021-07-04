<?php


namespace app\controllers;

use app\core\Application;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController
{
    /**
     * @return mixed
     */
    public static function home()
    {
        $params = [
            'name' => 'ben lim'
        ];
        return Application::$app->router->renderView('home', $params);
    }
    /**
     * @return string
     */
    public static function handleContact(): string
    {
        return 'handling submitted data';
    }
    public static function contact(): string
    {
        return Application::$app->router->renderView('contact');
    }
}