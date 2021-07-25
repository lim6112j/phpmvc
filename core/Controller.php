<?php


namespace app\core;


use app\middlewares\LoginMiddleware;
use app\middlewares\AuthMiddleware;
/**
 * Class Controller
 * @package app\core
 */
class Controller
{
    protected const LOGINCOMMONDATA = 'login_array';
    protected const AUTHCOMMONDATA = 'auth_array';
    public string $layout = 'default';
    protected array $middlewares = [];
    protected array $middleWareData = [];
    /**
     * @return array
     */
    public function getMiddleWareData(): array
    {
        return $this->middleWareData;
    }

    /**
     * @param array $data
     */
    public function setMiddleWareData($middleware, array $data): void
    {
//        $middleware !== LoginMiddleware::class ?: $this->middleWareData[self::LOGINCOMMONDATA] = $data;
//        $middleware !== AuthMiddleware::class ?: $this->middleWareData[self::AUTHCOMMONDATA] = $data;
        foreach ($data as $key => $value){
            $this->middleWareData[$key] = $value;
        }
    }
    /**
     * @param $view
     * @param array $params
     * @return array|false|string|string[]
     */
    public function render($view, array $params=[])
    {
        return Application::$app->router->renderView($view, $params);
    }
    public function renderJson($data, array $params=[]){
        return json_encode($data);
    }
    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[get_class($middleware)] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}