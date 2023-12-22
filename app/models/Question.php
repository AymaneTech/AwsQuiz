<?php

namespace App\Models;
use App\Core\BaseModel;
use App\Helpers\Functions;

class Question extends BaseModel
{
    private $id;
    private $questionText;
    private $questionDesc;
    private $answerArr;
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
        return parent::fetchRandom();
    }
}