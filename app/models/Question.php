<?php

namespace App\Models;
use App\Core\BaseModel;
use App\Helpers\Functions;

class Question extends BaseModel
{
    private $id;
    private $questionText;
    private $questionDesc;
    public function __construct()
    {
        parent::__construct("question");
    }
    public function __get($property){
        return $this->$property;
    }

    public function fetchAllQuestions()
    {
        return parent::fetchAll();
    }
    public function fetchRandomQuestion(){
        parent::__set("columns", ["id","questionText"] );
        return parent::fetchRandom();
    }
}