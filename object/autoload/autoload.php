<?php

    $autoload = function ($class) {
        $dir = __DIR__ . '/../models/';
        $sheme = '.class.php';
        if (file_exists($dir . $class . $sheme)) {
            require_once $dir . $class . $sheme;
        }
    };

    // spl_autoload_register($autoload);
    // spl_autoload_register('autoload');

    spl_autoload_register($autoload);

    
