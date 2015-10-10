<?php

    namespace routes\ask;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/../");
    
    require_once(ROOT . '/utils/response/render.php');
    use utils\response;

    response\render("ask/index.php");
?>