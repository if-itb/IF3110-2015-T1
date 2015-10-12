<?php

require_once 'core/App.php';
require_once 'core/Controller.php';


define('ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'] . 
        str_replace(
            $_SERVER['DOCUMENT_ROOT'],
            '',
            str_replace('\\', '/', dirname(__DIR__) . '/public')
        )
);