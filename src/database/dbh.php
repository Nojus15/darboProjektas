<?php

namespace MyApp\database;

use \PDO;

class dbh
{
    private static $connection = null;

    private static $host = 'localhost';
    private static $port = '3306';
    private static $dbname = 'product';
    private static $user = 'root';
    private static $psw = '';

    public static function getPDO()
    {
        if (is_null(self::$connection)) {
            $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";";
            self::$connection = new PDO($dsn, self::$user, self::$psw);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}
