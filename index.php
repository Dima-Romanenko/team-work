<?php

spl_autoload_register(function($classname) {
    $classname = str_replace('\\',
    DIRECTORY_SEPARATOR, $classname);
    $classname = 'vendor'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.$classname.'php';
    if(file_exists($classname)) {
        include_once $classname;
        return true;
    }
    return false;
});
