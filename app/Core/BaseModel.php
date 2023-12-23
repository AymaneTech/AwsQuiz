<?php

namespace App\Core;

use App\Helpers\Functions;
use App\Core\Database;
use PDO;
use PDOException;

abstract class BaseModel
{
    private $tableName;
    private $columns = ["*"];

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }
    public function __set($property, $value)
    {
        $this->$property = $value;
    }
    public function __get($property){
        return $this->$property;
    }
    protected function fetchAll()
    {
        try {
            $columns = implode(',', $this->columns);
            $stmt = Database::connect()->query("SELECT {$columns} FROM {$this->tableName}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("i am in model class =====> <br>" . $e->getMessage());
        }
    }
    protected function findByColumnName($columnName, $value)
    {
        try {
            $columns = implode(',', $this->columns);
            $stmt = Database::connect()->prepare("SELECT {$columns} from {$this->tableName} where {$columnName} = :value");
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "i am in model class ===> <br>" . $e->getMessage();
        }
    }
    protected function fetchRandom()
    {
        try {
            $columns = implode(',', $this->columns);
            $stmt = Database::connect()->query("SELECT {$columns} from {$this->tableName} order by rand() limit 1");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("i am in model class ===> <br>" . $e->getMessage());
        }
    }
}

