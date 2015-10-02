<?php

namespace stackexchange\core;

class Controller
{
    public function __construct()
    {

    }

    protected function render($viewPath, $data = [])
    {
        $filePath = APP_PATH . DIRECTORY_SEPARATOR . $viewPath;

        if (is_file($filePath)) {
            if (is_array($data)) {
                extract($data);
            }

            ob_start();
            include $filePath;
            echo ob_get_clean();
        }
    }
}