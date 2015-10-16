<?php
	include 'dbmgr.php';
	if (!isset($_POST['qid'])||!isset($_POST['up'])){
		http_response_code(400);
		exit();
	}
	if(isset($_POST['aid'])){
		voteAnswer($_POST['qid'],$_POST['aid'],$_POST['up']=="true");
		echo getAnswerVote($_POST['qid'],$_POST['aid']);
	}else{
		voteQuestion($_POST['qid'],$_POST['up']=="true");
		echo getQuestionVote($_POST['qid']);
	}
?>
