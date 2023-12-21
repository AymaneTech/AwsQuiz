<?php

namespace App\Core;

use PDO;
use PDOException;

class Model
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

    public function selectFromTable()
    {
        try {
            $columns = implode(',', $this->columns);
            $stmt = Database::connect()->query("SELECT {$columns} FROM {$this->tableName}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("i am in model class =====> <br>" . $e->getMessage());
        }
    }
    public function findByColumnName($columnName, $value){
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
}
