<?php 
	include('db_connector.php');
	$result = mysqli_query($con,"SELECT question.id, question.name, question.topic, question.content, question.timestamp, question.votes, COUNT(answer.id) AS count FROM (question LEFT JOIN answer ON question.id = answer.id)");
	mysqli_close($con);
?>