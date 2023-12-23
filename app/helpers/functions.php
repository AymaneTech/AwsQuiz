<?php

namespace App\Helpers;

class Functions
{
    public static function dd($var){
        echo "<br>";
        print_r($var);
        echo "<br>";
        die();
    }
}