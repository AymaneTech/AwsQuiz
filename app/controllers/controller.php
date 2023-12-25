<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../../vendor/autoload.php';
use App\Helpers\Functions;
use App\Controllers\QuestionController;
use App\Controllers\AnswerController;
$array =[];
if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
}
if ($_SESSION["count"] == 0) {
    $_SESSION["points"] = 0;
}
if (!isset($_SESSION["incorrectAnswers"])){
    $_SESSION["incorrectAnswers"] =0;
}
if (isset($_POST["takePseudoName"])) {
    $_SESSION["pseudoName"] = filter_var($_POST["pseudoName"], FILTER_SANITIZE_STRING);
    header("Location: ../../public/startgame.php");
}
// check answers correction
if (isset($_POST["answeredId"])) {
    $object = new AnswerController();
    $result = $object->isCorrectAnswer($_POST["questionFk"], $_POST["answeredId"]);
    if ($result) {
        echo 1;
        $_SESSION["points"] += 10;
    } else {
        echo 0;
        echo json_encode($object->wrongAnswer($_POST["answeredId"]));
        $_SESSION["incorrectAnswers"]++;
    }
}
// send response to js
if (isset($_POST["ok"])) {
    if ($_SESSION["count"] >= 10) {
        $_SESSION["correctAnswers"] = 10 - $_SESSION["incorrectAnswers"];
        $response = ["status" => "game_over",
            "info" => $_SESSION
        ];
        echo json_encode($response);
        session_unset();
        exit();
    }
    $_SESSION["count"] += 1;
    $QuestionController = new QuestionController();
    $response = $QuestionController->prepareQuestion();
    $response = ["counter" => $_SESSION["count"]] + $response;
    echo json_encode($response);
}