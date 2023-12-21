<?php
require_once 'config.php';
class Database
{
    public static $connection;
    public static function connect()
    {
        if (Database::$connection === null){
            try {
                Database::$connection = new PDO (HOST . DBNAME, USERNAME, PASSWORD);
                Database::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "error homie again !!! " . $e->getMessage();
            }
        }
        return Database::$connection;
    }
}