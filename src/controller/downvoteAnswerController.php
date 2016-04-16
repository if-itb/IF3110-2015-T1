<?php

require_once "../model/answer.php";

$id = $_GET["id"];
$answerModel = new Answer();
$answerModel->downvote($id);

$vote = $answerModel->getVote($id);
echo $vote;

?>