<?php
	include ('../controller.php');

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

		$id = $_GET['id'];
		$type = $_GET['t'];
		$qa = $_GET['qa'];
		$arr = array();

		if ( $qa == "question") {
			if ( $type == "up") {
				upVoteQuestion($id);
			} else {
				downVoteQuestion($id);
			}
			$arr = getQuestionbyId($id);
		} else {
			if ( $type == "up") {
				upVoteAnswer($id);
			} else {
				downVoteAnswer($id);
			}
			$arr = getAnswerbyId($id);
		}

		echo $arr['vote'];

	}
?>

