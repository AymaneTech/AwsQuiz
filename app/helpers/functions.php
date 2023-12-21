<?php

namespace App\Helpers;

class Functions
{
    public static function dd($var){
        echo "<br>";
        var_dump($var);
        echo "<br>";
        die();
    }
}