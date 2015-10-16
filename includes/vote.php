<?php 

	// "../" is one level higher and "../.." is two level higher
    $url = "../controller.php";
    require($url);

	if (isset($_GET['q_id'])){
		$q_id = $_GET['q_id'];
		$is_question = $_GET['q'];
		$is_up = $_GET['v'];

		if ($is_question == "true"){
			voteQuestion($q_id,$is_up);
		}
		else{
			$a_id = $_GET['a_id'];
			voteAnswer($q_id,$a_id,$is_up);
		}
	}
?>