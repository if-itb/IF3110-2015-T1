<?php
    
    namespace utils\response;

    function render($filename, $data){
        $path = ROOT . '/views/' . $filename;
        include $path;
    };

    function returnMessageJSON($status, $message){
        http_response_code($status);
        $arr = array('message' => $message);

        echo json_encode($arr);
    };

    function returnDataJSON($status, $data){
        http_response_code($status);
        echo json_encode($data);
    };
?>