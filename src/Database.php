<?php
namespace Absszero\PSStore;

use PDO;

class Database
{
    const TABLE = 'tracks';
    const MYSQL = 'mysql:host=%s;port=%d;dbname=%s';
    const UPDATE = 'UPDATE %s SET %s WHERE %s';
    const INSERT = 'INSERT INTO %s(%s) VALUES(%s)';
    static public $instance;
    public static function instance()
    {
        if (!self::$instance) {
            $config = require __DIR__ . '/../config/database.php';
            $dsn = self::getDSN($config);

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            if ('mysql' === $config['type']) {
                $options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
            }

            self::$instance = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                $options
            );
        }


        return self::$instance;
    }

    public function close()
    {
        self::$instance = null;
    }

    public function driver()
    {
        return self::instance()->getAttribute(PDO::ATTR_DRIVER_NAME);
    }

    public function autoIncrement($sql)
    {
        switch ($this->driver()) {
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

    public function save(array $data, $id = null)
    {
        $fields = array_keys($data);
        if ($id) {
            $data[] = $id;
            $fields = implode(' = ?,', $fields) . ' = ?';
            $sql = sprintf(self::UPDATE, self::TABLE, $fields, 'id = ?');
        } else {
            $values = array_fill(0, count($fields), '?');
            $fields = implode(', ', $fields);
            $values = implode(', ', $values);
            $sql = sprintf(self::INSERT, self::TABLE, $fields, $values);
        }

        self::instance()->prepare($sql)->execute(array_values($data));

        return self::instance()->lastInsertId();
    }

    public function select($fields = '*', $style = null)
    {
        $fields = implode(', ', (array)$fields);
        $sth = self::instance()->prepare("SELECT $fields FROM " . self::TABLE);
        $sth->execute();

        $data = $sth->fetchAll($style);
        if ((PDO::FETCH_GROUP|PDO::FETCH_ASSOC) === $style) {
            $data = array_map('reset', $data);
        }

        return $data;
    }

    public function delete($id)
    {
        $sth = self::instance()->prepare("DELETE FROM " . self::TABLE . " WHERE id = ?");
        $sth->execute([$id]);
    }
}
