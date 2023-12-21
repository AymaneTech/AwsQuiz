<?php

namespace App\Helpers;

class Functions
{
    public static function dd($var){
//        echo "<pre>";
        print_r($var);
//        echo "</pre>";
        die();
    }
}