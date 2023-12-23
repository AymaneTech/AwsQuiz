<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';

use App\Helpers\Functions;
use App\Controllers\QuestionController;
use App\Models\Question;

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../App/Views/assets/css/style.css">
    <?php include '../App/Views/includes/head.php' ?>
    <title>Quiz APP | Home</title>
</head>
<body>
    <div class="container">
        <div class="center flex flex-col gap-16">
            <h1 class="font-bold text-6xl">Welcome to AWS Quiz App</h1>
            <button type="button" id="startQuiz"
                    class="btn-primary bg-slate-950 rounded-3xl text-white font-bold p-4 w-[200px]">
                <a href="./quiz.php">Start Game</a>
            </button>
        </div>
    </div>
</body>
</html>


