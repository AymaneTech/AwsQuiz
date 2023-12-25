<?php

namespace App\Models;
use App\Core\BaseModel;

class Answer extends BaseModel
{
    private $id;
    private $answerText;
    private $answerStatus;
    private $question;
    public function __construct()
    {
        parent::__construct("answer");
    }
    public function fetchAllAnswers (){
        return parent::fetchAll();
    }
    public function isCorrectAnswer($id){
        parent::__set("columns" ,["ID", "answerStatus"]);
        return parent::findCorrectAnswer($id);
    }
}