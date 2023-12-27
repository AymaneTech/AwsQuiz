<?php

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

<body class="overflow-hidden">
        <div class="center flex flex-col gap-16">
                        <div id="form-container" class="form-container bg-white rounded-3xl shadow-xl py-4 px-8">
                                <div>
                                        <div class="after:mt-4 after:block after:h-1 after:w-full after:rounded-lg after:bg-gray-200">
                                                <ol class="grid grid-cols-3 text-sm font-medium text-gray-500">
                                                        <li class="relative flex justify-start text-blue-600">
                                                                <span class="absolute -bottom-[1.75rem] start-0 rounded-full bg-blue-600 text-white">
                                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                        </svg>
                                                                </span>
                                                                <span class="hidden sm:block"> Pseudo Name </span>
                                                                <svg class="h-6 w-6 sm:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                                </svg>
                                                        </li>
                                                        <li class="relative flex justify-center text-gray-600">
                                                                <span class="absolute -bottom-[1.75rem] rounded-full bg-gray-600 text-white">
                                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                        </svg>
                                                                </span>

                                                                <span class="hidden sm:block"> Play </span>

                                                                <svg class="mx-auto h-6 w-6 sm:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                </svg>
                                                        </li>

                                                        <li class="relative flex justify-end">
                                                                <span class="absolute -bottom-[1.75rem] end-0 rounded-full bg-gray-600 text-white">
                                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                        </svg>
                                                                </span>
                                                                <span class="hidden sm:block"> Result </span>

                                                                <svg class="h-6 w-6 sm:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                                </svg>
                                                        </li>
                                                </ol>
                                        </div>
                                </div>
                                <form method="post" action="../App/Controllers/controller.php" class="flex flex-col items-center justify-center gap-4 p-32">
                                        <label for="pseudoName"></label>
                                        <input id="pseudoName" type="text" name="pseudoName" placeholder="Enter your Pseudo Name" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-[200px] px-[40px]">
                                        <button name="takePseudoName" type="submit" class="btn-primary bg-slate-950	rounded-3xl text-white font-bold p-4 w-[200px]">Start Game
                                        </button>
                                </form>
                        </div>

                </div>
        <div class="container mt-20">
        </div>


</body>

</html>