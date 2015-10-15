<?php

require_once("../bootstrap.php");

$threadController = new \stackexchange\controller\ThreadController();
$threadController->index();