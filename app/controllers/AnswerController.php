<?php
namespace App\Controllers;

use App\Models\Answer;
use App\Helpers\Functions;

class AnswerController {
    private $answerObject;
    public function __construct (){
        $this->answerObject = new Answer();
    }
    public function isCorrectAnswer($questionFk, $answerId)
    {
        $row = ($this->answerObject->isCorrectAnswer($questionFk));
        if($row["ID"] == $answerId){
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }
    public function fetchCorrectAnswer($questionFk){
        return $this->answerObject->correctAnswer($questionFk);
    }
}