<?php

require("../../bootstrap.php");

$answerController = new \stackexchange\controller\AnswerController();
$answerController->downvote();