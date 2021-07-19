<?php


namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\middlewares\LoginMiddleware;

/**
 * Class AuthController
 * @package app\controllers
 */
class AuthController extends Controller
{
//    public function __construct()
//    {
//        $this->registerMiddleware(LoginMiddleware::getInstance());
//    }
    /**
     * @return mixed
     */
    public function login(Request $request)
    {
        $this->setlayout('auth');
        if($request->isPost()){
            return 'handle login submitted data';
        }
        return $this->render('login');
    }

    /**
     * @return mixed
     */
    public function register(Request $request)
    {
        $this->setlayout('auth');
        if($request->isPost()){
            return 'handle register submitted data';
        }
        return $this->render('register');

    }

    /**
     * @return mixed
     */
    public function logout()
    {
        return $this->render('logout');
    }
}