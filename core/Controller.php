<?php


namespace app\core;


/**
 * Class Controller
 * @package app\core
 */
class Controller
{
    public string $layout = 'main';
    /**
     * @param $view
     * @param array $params
     * @return array|false|string|string[]
     */
    public function render($view, array $params=[])
    {
        return Application::$app->router->renderView($view, $params);
    }

    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
}