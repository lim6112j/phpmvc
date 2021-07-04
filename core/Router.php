<?php
namespace app\core;
/**
 * Class Router
 * @package app\core
 */
class Router {
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * @param string $string
     * @param \Closure $param
     */
    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }
    /**
     * @return array|false|mixed|string|string[]
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback===false){
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = $callback[0];
        }
        return call_user_func($callback, $this->request);
    }

    /**
     * @param string $view
     * @return array|false|string|string[]
     */
    public function renderView(string $view, $params=[])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * @return false|string
     */
    private function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layout/$layout.php";
        return ob_get_clean();
    }

    /**
     * @param $view
     * @return false|string
     */
    private function renderOnlyView($view, $params) {
//        echo '<pre>';
//        var_dump($params);
//        echo '</pre>';
//        exit;
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}