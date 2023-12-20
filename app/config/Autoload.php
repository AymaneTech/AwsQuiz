<?php

spl_autoload_register(function ($className){
    if (file_exists('models/'.$className.'.php')){
        include_once 'models/'.$className.'.php';
    }else if (file_exists('controllers/'.$className.'.php')){
        include_once 'controllers/'.$className.'.php';
    }else if (file_exists('config/'.$className.'.php')){
        include_once 'config/'.$className.'.php';
    }else if (file_exists('helpers/'.$className.'.php')){
        include_once 'helpers/'.$className.'.php';
    }
});