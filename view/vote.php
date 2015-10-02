<?php
	include ('../view/layout/header.php');

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

		$id = $_GET['id'];
		$type = $_GET['t'];
		$qa = $_GET['qa'];

		if ( $qa == "question") {
			if ( $type == "up") {
				upVoteQuestion($id);
			} else {
				downVoteQuestion($id);
			}
		} else {
			if ( $type == "up") {
				upVoteAnswer($id);
			} else {
				downVoteAnswer($id);
			}
		}

	}
	
	include ('../view/layout/footer.php');
?>

