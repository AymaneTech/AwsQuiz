<?php


require_once '../../vendor/autoload.php';
use App\Helpers\Functions;
use App\Controllers\QuestionController;


if(isset($_POST["pseudoName"])){


    $test = new QuestionController();
    $data = (object)$test->prepareQuestion();
    print_r($data);


    echo "i'm here";
}