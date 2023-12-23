<?php
session_start();

require_once '../../vendor/autoload.php';
use App\Helpers\Functions;
use App\Controllers\QuestionController;


if(isset($_POST["takePseudoName"])){
    $_SESSION["pseudoName"] = $_POST["pseudoName"];
    header("location: ../../public/startgame.php");
}
if (isset($_POST["ok"])){
    $test = new QuestionController();
    $data = json_encode($test->prepareQuestion());
    print_r($data);
}
if (isset($_POST["answeredId"])){
    echo "done ";
}