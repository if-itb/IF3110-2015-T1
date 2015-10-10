<?php 
	require_once('../controller.php');
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$question = $_GET['q'];
		$vote = $_GET['v'];
		vote($id,$question,$vote);
	}
?>