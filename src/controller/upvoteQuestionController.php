<?php

require_once "../model/question.php";

$id = $_GET["id"];
$questionModel = new Question();
$questionModel->upvote($id);

$vote = $questionModel->getVote($id);
echo $vote;

?>