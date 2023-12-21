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

    public function fillArr()
    {
        $array = array();
        Functions::dd("here");
        while (count($array) != 10) {

            if ($this->questionObject->fetchRandomQuestion()) {
                if (in_array($this->questionObject->__get("id"), $array)) {
                    $this->questionObject->fetchRandomQuestion();
                } else {
                    array_push($array, $this->questionObject->__get("id"), $array);
                    echo $this->questionObject->__get("id");
//                var_dump($this->questionObject->fetchRandomQuestion());
                    echo "<br>";
                }
            }
//            print_r($array);
        }
//        return $array;
    }
}