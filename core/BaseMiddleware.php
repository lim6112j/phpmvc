<?php


namespace app\core;

abstract class BaseMiddleware
{
    abstract public function execute(): array;
    abstract public static function getInstance();
}