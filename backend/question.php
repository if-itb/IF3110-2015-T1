<?php 
	include('db_connector.php');
	$id = $_GET['id'];
	$sql = "SELECT question.id, question.name, question.topic, question.content, question.timestamp, question.votes, COUNT(answer.id) AS count FROM (question LEFT JOIN answer ON question.id = answer.id) WHERE question.id ='$id'";
	$result = mysqli_query($con,$sql);
	$question = mysqli_fetch_array($result);
	mysqli_close($con);
?>