<?php
namespace Absszero\PSStore;

use PDO;

class Database
{
    const MYSQL = 'mysql:host=%s;port=%d;dbname=%s';
    static public $instance;
    public static function instance()
    {
        if (!self::$instance) {
            $config = require __DIR__ . '/../database.php';
            $dsn = sprintf(self::MYSQL, $config['host'], $config['port'], $config['dbname']);
            self::$instance = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        }


        return self::$instance;
    }
}
