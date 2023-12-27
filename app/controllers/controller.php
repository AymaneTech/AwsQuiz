<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
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
if (!isset($_SESSION["incorrectAnswers"])) {
    $_SESSION["incorrectAnswers"] = 0;
}
if (!isset($_SESSION["array"])) {
    $_SESSION["array"] = [];
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

// send response to js
if (isset($_POST["ok"])) {
    if ($_SESSION["count"] >= 10) {
        $_SESSION["correctAnswers"] = 10 - $_SESSION["incorrectAnswers"];
        $response = ["status" => "game_over",
            "info" => $_SESSION,
        ];
        echo json_encode($response);
        unset($_SESSION["incorrectAnswers"], $_SESSION["correctAnswers"], $_SESSION["count"], $_SESSION["points"], $_SESSION["status"], $_SESSION["array"]);
        exit();
    }
    $_SESSION["count"] += 1;

    $QuestionController = new QuestionController();
    $response = $QuestionController->prepareQuestion("ID", $_SESSION["array"]);
    $fetchedId = $response["questionID"];
    $_SESSION["array"][] += $fetchedId;
    $response = ["counter" => $_SESSION["count"]] + $response;
    echo json_encode($response);
}
