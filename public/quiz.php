<?php
session_start();
if (!isset($_SESSION['pseudoName'])) {
    header('location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <link rel="stylesheet" href="../App/Views/assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-gray-200">
<section id="container" class="container m-auto py-4 h-[100vh] flex flex-col justify-between align-center">


</section>

<script src="../App/Views/assets/js/index.js"></script>
<script src="../App/Views/assets/js/logic.js"></script>
<script src="../App/Views/assets/js/timer.js"></script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</body>
</html>