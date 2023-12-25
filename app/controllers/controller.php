<?php
session_start();

require_once '../../vendor/autoload.php';

use App\Helpers\Functions;
use App\Controllers\QuestionController;
use App\Controllers\AnswerController;

if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
}
if ($_SESSION["count"] == 0) {
    $_SESSION["points"] = 0;
}
if (!isset($_SESSION["incorrectAnswers"])){
    $_SESSION["incorrectAnswers"] = array();
}
if (isset($_POST["takePseudoName"])) {
    $_SESSION["pseudoName"] = $_POST["pseudoName"];
    header("Location: ../../public/startgame.php");
}
if (isset($_POST["ok"])) {
    if ($_SESSION["count"] >= 10) {
        $response = ["status" => "game_over",
                    "score" => $_SESSION["points"],
                    "pseudoName" => $_SESSION["pseudoName"],
                    "incorrectAnswers" => $_SESSION
            ];
        echo json_encode($response);
        unset($_SESSION["count"]);
        exit();
    }
    $_SESSION["count"] += 1;
    $QuestionController = new QuestionController();
    $response = $QuestionController->prepareQuestion();
    $response = ["counter" => $_SESSION["count"]] + $response;


    echo json_encode($response);
}
if (isset($_POST["answeredId"])) {
    $object = new AnswerController();
    $result = $object->isCorrectAnswer($_POST["questionFk"], $_POST["answeredId"]);
    if ($result) {
        echo 1;
        $_SESSION["points"] += 10;
    } else {
        echo 0;
        $_SESSION["incorrectAnswers"] = $_POST["questionFk"];
    }
}

