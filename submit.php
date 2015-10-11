<?php
	include "function/database.php";
	$conn = connect_database();
	$data = $_POST;
	if(isset($_GET["q_id"])) $data["question_id"] = $_GET["q_id"];
	
	update_database($_GET["idx"],$conn,$data);
?>