<?php

require_once '../model/question.php';

$questionModel = new Question();
$questionModel->upvote(19);

?>