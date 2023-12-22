<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../vendor/autoload.php';

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
        <div id="form-container" class="form-container bg-gradient-to-r from-violet-500 to-fuchsia-500 p-40 rounded-3xl shadow-lg shadow-slate-200	">
            <form action="" class="flex flex-col items-center justify-center gap-4">
                <label for="pseudoName"></label>
                <input id="pseudoName" type="text" name="pseudoName" placeholder="Enter your Pseudo Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-[200px] px-[40px]">
                <button type="button" id="startQuiz" class="btn-primary bg-slate-950	rounded-3xl text-white font-bold p-4 w-[200px]">Start Game</button>
            </form>
        </div>

    </div>
</div>


<script src="App/Views/assets/js/index.js"></script>
</body
</html>

