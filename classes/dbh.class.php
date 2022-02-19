<?php

class dbh
{
    private static $connection = null;

    private static $host = 'sql11.freemysqlhosting.net';
    private static $port = '3306';
    private static $dbname = 'sql11472264';
    private static $user = 'sql11472264';
    private static $psw = 'hddkpS766W';

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
