<?php

require_once '../vendor/autoload.php';

use App\Helpers\Functions;
use App\Controllers\QuestionController;
error_reporting(E_ALL);
ini_set('display_errors', '1');

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
        <div class="center">
            <?php include '../App/Views/components/form.php' ?>
        </div>
    </div>


    <script src="../App/Views/assets/js/index.js"></script>
</body>
</html>

