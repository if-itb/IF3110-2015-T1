<?php

spl_autoload_register(function ($class) {
    $file = str_replace('stackexchange\\', '', $class);
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . $file . ".php";

    if (file_exists($file)) {
        require($file);
    }
});