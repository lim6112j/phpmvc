<?php
namespace app\core;
use app\controllers\DefaultController;
use app\models\TheCheatAPI;
use app\utils\Utility;

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
    public function get($path, $callback, array $middlewares=[])
    {
        $this->routes['get'][$path] = [
            'callback' => $callback,
            'middlewares' => $middlewares
            ];
    }

    /**
     * @param string $path
     * @param $callback
     */
    public function post(string $path,  $callback, array $middlewares)
    {
        $this->routes['post'][$path] = [
            'callback' => $callback,
            'middlewares' => $middlewares
        ];
    }
    /**
     * @return array|false|mixed|string|string[]
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $routeAsset = $this->routes[$method][$path] ?? false;
        if($routeAsset===false){
            Application::$app->setController(new DefaultController());
            $this->response->setStatusCode(404);
            // 라우팅 테이블에 없는 경우 구글 검색으로 리다이렉팅.
            // header('Location: https://www.google.com/search?q=%EB%8D%94%EC%B9%98%ED%8A%B8&oq=%EB%8D%94%EC%B9%98%ED%8A%B8&aqs=chrome..69i57j69i61l3j69i59&sourceid=chrome&ie=UTF-8');
            // 또는 404 페이지 보여줌.
            return $this->renderView('_404');
        }

        if(is_array($routeAsset)){
            // controller instantiate
            $controllerInstance = new $routeAsset['callback'][0]();
            Application::$app->setController($controllerInstance);
            // change controller name string => controller instance object.
            $routeAsset['callback'][0] = $controllerInstance;
            // global middleware처리
            foreach (Application::$app->appMiddlewares as $middleware){
                $middlewareInstance = $middleware::getInstance();
                $middlewareData = $middlewareInstance->execute();
                $controllerInstance->setMiddlewareData($middleware, $middlewareData);
            }

            // 컨트롤러 개별 middleware 처리
            $middlewares = $routeAsset['middlewares'];
            foreach ($middlewares as $middleware) {
                $middlewareInstance = $middleware::getInstance();
                $middlewareData = $middlewareInstance->execute();
                // 미들웨어에서 생성한 콘트롤러 공통 데이터 인젝션.
                $controllerInstance->setMiddlewareData($middleware, $middlewareData);
            }

        }
        return call_user_func($routeAsset['callback'], $this->request);
    }

    /**
     * @param string $view
     * @return array|false|string|string[]
     */
    public function renderView(string $view, $params=[])
    {
        foreach ($params as $key => $value) {
            if($key === 'type' && $value === 'json') {
                $result = TheCheatAPI::getAll();
                return json_encode($result);
            }
        }
//        $layoutContent = $this->layoutContent();
//        $viewContent = $this->renderOnlyView($view, $params);
//        return str_replace('{{content}}', $viewContent, $layoutContent);
        return $this->renderOnlyView($view, $params);
    }

    /**
     * @return false|string
     */
    private function layoutContent()
    {
        $layout = Application::$app->getController()->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layout/$layout.php";
        return ob_get_clean();
    }

    /**
     * @param $view
     * @param $params
     * @return false|string
     */
    private function renderOnlyView($view, $params) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}