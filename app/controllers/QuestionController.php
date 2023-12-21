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
        return ($this->questionObject->fetchRandomQuestion());
    }
}