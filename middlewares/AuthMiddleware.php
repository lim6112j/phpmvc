<?php


namespace app\middlewares;


use app\core\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{
    protected static $_instance = null;

    public static function getInstance()
    {
        if (static::$_instance === null)
        {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
    public function execute():array
    {

        $login_array['now_year'] = date("Y");
        $login_array['now_month'] = date("m");
        $login_array['test'] = true;
//        ($login_array['member_uid'] && $login_array['member_uid']>0)
//            ?: header('Location:/');
        return $login_array;
    }
}