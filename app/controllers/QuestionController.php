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
    public function prepareQuestion()
    {
//        $this->questionObject = new Question();
        $this->questionObject->fetchRandomQuestion();
        $this->questionObject->fetchAnswers();
        return  [
            'questionID' => $this->questionObject->__get("questionID"),
            'questionText' => $this->questionObject->__get("questionText"),
            'questionDesc' => $this->questionObject->__get("questionDesc"),
            'answerArray' => $this->questionObject->__get("answers"),
        ];
    }
}

