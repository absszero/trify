<?php
namespace Absszero\PSStore;

use PDO;

class Database
{
    const TABLE = 'tracks';
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

    public function query($sql)
    {
        return self::instance()->query($sql);
    }

    public function save(array $data)
    {
        $fileds = array_keys($data);
        $values = array_fill(0, count($fileds), '?');
        $fileds = implode(', ', $fileds);
        $values = implode(', ', $values);
        $sql = "INSERT INTO {self::TABLE} ($fileds) VALUES($values)";

        return self::instance()->prepare($sql)
        ->execute(array_values($data));
    }

    public function select($fields)
    {
        $fields = implode(', ', $fields);

        $sth = self::instance()->prepare("SELECT $fields FROM " . self::TABLE);
        $sth->execute();

        return $sth->fetchAll();
    }
}
