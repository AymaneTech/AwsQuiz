<?php

namespace App\Controllers;

use App\Models\Question;
use App\Helpers\Functions;

class QuestionController
{
    private $questionObject;
    public function __construct()
    {
        $this->questionObject = new Question();
    }
    public function prepareQuestion($column, $array)
    {
        $this->questionObject->fetchRandomQuestion($column, $array);
        $this->questionObject->fetchAnswers();
        return  [
            'questionID' => $this->questionObject->__get("questionID"),
            'questionText' => $this->questionObject->__get("questionText"),
            'answerArray' => $this->questionObject->__get("answers"),
        ];
    }
    public function prepareCorrectionQuestion($questionID){
            return $this->questionObject->fetchCorrectionQuestions($questionID);
    }
}

