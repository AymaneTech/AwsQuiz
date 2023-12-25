<?php
session_start();

require_once '../../vendor/autoload.php';

use App\Helpers\Functions;
use App\Controllers\QuestionController;
use App\Controllers\AnswerController;

if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
}
if (!isset($_SESSION["points"])) {
    $_SESSION["points"] = 0;
}
if (isset($_POST["takePseudoName"])) {
    $_SESSION["pseudoName"] = $_POST["pseudoName"];
    header("Location: /public/startgame.php");
}
if (isset($_POST["ok"])) {
    if ($_SESSION["count"] >= 10) {
        $response = ["status" => "game_over"];
        echo json_encode($response);
        unset($_SESSION["count"]);
        exit();
    }
    $_SESSION["count"] += 1;
    $test = new QuestionController();
    $result = $test->prepareQuestion();
    $data = json_encode($result);
    echo $data;
}
if (isset($_POST["answeredId"])) {
    $object = new AnswerController();
    $result = $object->isCorrectAnswer($_POST["questionFk"], $_POST["answeredId"]);
    echo "counter" . $_SESSION["count"];
    if ($result) {
        echo 1;
        $_SESSION["points"] += 10;
    } else {
        echo 0;
    }
}
?>
