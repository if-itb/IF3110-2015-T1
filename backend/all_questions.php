<?php 
	include('db_connector.php');
	$result = mysqli_query($con,"SELECT id, name, topic, content, timestamp, SELECT COUNT(*) FROM answer WHERE id = '$id' AS count FROM question");
	mysqli_close($con);
?>