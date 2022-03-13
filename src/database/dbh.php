<?php

namespace MyApp\database;

use \PDO;

class dbh
{
    private static $connection = null;

    private static $host = 'sql11.freemysqlhosting.net';
    private static $port = '3306';
    private static $dbname = 'sql11477470';
    private static $user = 'sql11477470';
    private static $psw = 'KQydnb4Si7';

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
