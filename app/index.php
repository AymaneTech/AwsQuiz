<?php

require_once '../vendor/autoload.php';
//use App\Models\Answer;
//use App\Models\Question;
use App\Helpers\Functions;
use App\Controllers\QuestionController as question;

$object = new question();
$test = $object->fillArr();
print_r($test);


