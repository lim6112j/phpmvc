<?php

namespace app\core;

use app\Config;
use PDO;
use PDOException;

abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = Config::DB_HOST;
            $db_name = Config::DB_NAME;
            $user = Config::DB_USER;
            $password = Config::DB_PASSWORD;

            try {
                $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",
                    $user, $password);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}