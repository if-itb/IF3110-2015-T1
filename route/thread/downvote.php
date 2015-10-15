<?php

require("../../bootstrap.php");

$threadController = new \stackexchange\controller\ThreadController();
$threadController->downvote();