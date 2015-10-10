<?php 
	include('db_connector.php');
	$result = mysqli_query($con,"SELECT DISTINCT question.id, question.name, question.topic, question.content, question.timestamp, question.votes, (SELECT COUNT(answer.id) as count FROM answer WHERE answer.id = question.id) as count FROM question ORDER BY id DESC");
	mysqli_close($con);
?>