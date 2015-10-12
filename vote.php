<?php 
	require_once('../controller.php');
	if (isset($_GET['id'])){
		$q_id = $_GET['id'];
		$is_question = $_GET['q'];
		$is_up = $_GET['v'];

		$question = getQuestion($q_id);
		$answers = getAnswers($q_id);

		if ($question){
			voteAnswer($q_id,$answers['a_id'],$is_up);
		}
		else{
			voteQuestion($q_id,$is_up);
		}
	}
?>