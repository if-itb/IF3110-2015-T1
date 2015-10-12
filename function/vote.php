<?php
	include 'database.php';
	$conn = connect_database();
	$sql = "UPDATE ";
	if($_GET["question"]==1) {
		$sql = $sql."`question` ";
	}
	else {
		$sql = $sql."`answer` ";	
	}
	if($_GET["up"]==1) {
		$sql = $sql."SET vote = vote + 1 ";
	}
	else {
		$sql = $sql."SET vote = vote - 1 ";
	}
	if($_GET["question"]==1) {
		$sql = $sql."WHERE question_id=".$_GET["id"];	
	}
	else {
		$sql = $sql."WHERE answer_id=".$_GET["id"];
	}
	//echo $sql;
	
	mysqli_query($conn,$sql);
	if($_GET["question"]==1) {
		$sql = "SELECT vote FROM `question` WHERE `question_id`=".$_GET["id"];
	}
	else {
		$sql = "SELECT vote FROM `answer` WHERE `answer_id`=".$_GET["id"];
	}
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_assoc($result)) echo $row["vote"];
?>