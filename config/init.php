<?php
    // session start
    session_start();

    // config file
    require_once 'config.php';

    // include helper file
    require_once 'helpers/system_helper.php';

    // autoload libraries
    spl_autoload_register(function($class_name) {
        require_once "libraries/$class_name.php"; // whenever class is instantiated, this looks for class name as a file so every class file has to have the same name as the actual class within it.
    });