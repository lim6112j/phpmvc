<?php


namespace app\middlewares;


use app\core\BaseMiddleware;

class DebugMiddleware extends BaseMiddleware
{
    protected static $_instance = null;

    public function execute(): array
    {
        $debugParam = array();
        $debugParam["debug"] = true;
        return $debugParam;
    }

    public static function getInstance()
    {
        if (static::$_instance === null)
        {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
}