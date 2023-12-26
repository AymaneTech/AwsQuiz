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
if (isset($_POST["pseudoName"])) {
    $_SESSION["pseudoName"] = filter_var($_POST["pseudoName"], FILTER_SANITIZE_STRING);
    header("Location: ../../public/startgame.php");
}
// check answers correction
if (isset($_POST["answeredId"])) {
    $answerController = new AnswerController();
    $questionController = new QuestionController();
    $result = $answerController->isCorrectAnswer($_POST["questionFk"], $_POST["answeredId"]);
    if ($result) {
        $_SESSION["points"] += 10;
        echo 1;
    } else {
        echo 0;
        $correctionArray = [$questionController->prepareCorrectionQuestion($_POST["questionFk"]),
            $answerController->fetchCorrectAnswer($_POST["questionFk"])];
        echo json_encode($correctionArray);
        $_SESSION["incorrectAnswers"]++;
    }
}
// send response to jsl
if (isset($_POST["ok"])) {
    if ($_SESSION["count"] >= 10) {
        $_SESSION["correctAnswers"] = 10 - $_SESSION["incorrectAnswers"];
        $response = ["status" => "game_over",
            "info" => $_SESSION,
        ];
        echo json_encode($response);
        unset($_SESSION["incorrectAnswers"]);
        unset($_SESSION["correctAnswers"]);
        unset($_SESSION["count"]);
        unset($_SESSION["points"]);
        unset($_SESSION["status"]);
        exit();
    }
    $id = 1;
    $_SESSION["count"] += 1;
    $QuestionController = new QuestionController();
    $response = $QuestionController->prepareQuestion();
    $array[] = $id;
    $response = ["counter" => $_SESSION["count"]] + $response;
    $response = ["arraytest" => $array] + $response;
    echo json_encode($response);
}