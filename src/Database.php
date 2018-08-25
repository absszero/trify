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
            $dsn = self::getDSN($config);
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

    public function close()
    {
        self::$instance = null;
    }

    public function autoIncrement($sql)
    {
        $driver = self::instance()->getAttribute(PDO::ATTR_DRIVER_NAME);
        switch ($driver) {
            case 'sqlite':
                $sql = sprintf($sql, 'id INTEGER PRIMARY KEY', '');
                break;
            case 'mysql':
                $sql = sprintf($sql, 'id int(11) NOT NULL AUTO_INCREMENT', ', PRIMARY KEY (id)');
                break;

            default:
                // code...
                break;
        }

        return $sql;
    }

    private static function getDSN(array $config)
    {
        switch ($config['type']) {
            case 'mysql':
                $dsn = sprintf(self::MYSQL, $config['host'], $config['port'], $config['dbname']);
                break;
            case 'sqlite':
                $dsn = 'sqlite:' . $config['host'];
                break;

            default:
                // code...
                break;
        }

        return $dsn;
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
        $sql = "INSERT INTO " . self::TABLE . " ($fileds) VALUES($values)";

        self::instance()->prepare($sql)
        ->execute(array_values($data));

        return self::instance()->lastInsertId();
    }

    public function select($fields = '*')
    {
        $fields = implode(', ', (array)$fields);
        $sth = self::instance()->prepare("SELECT $fields FROM " . self::TABLE);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function delete($id)
    {
        $sth = self::instance()->prepare("DELETE FROM " . self::TABLE . " WHERE id = ?");
        $sth->execute([$id]);
    }
}
