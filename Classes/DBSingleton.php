<?php

class DBSingleton
{
    private static ?PDO $pdoObject = null;
    private static string $dsn = "mysql:host=%s;charset=%s";

    /**
     * @return PDO
     */
    public static function PDO(): PDO
    {
        if (self::$pdoObject === null) {
            try {
                $dsn = sprintf(self::$dsn, Config::DB_HOST, Config::DB_NAME, Config::DB_CHARSET);
                self::$pdoObject = new PDO($dsn, Config::DB_USERNAME, Config::DB_PASSWORD);
                self::$pdoObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                die();
            }
        }
        return self::$pdoObject;
    }
}