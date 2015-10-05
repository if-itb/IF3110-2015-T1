<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<title>Stack Exchange</title>
	</head>
	<body>
		<h1>Simple StackExchange</h1>
	</body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "stack_exchange";
	
	$conn = new mysqli($servername, $username, $password, $db_name);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * FROM question";
	$result = $conn->query($sql);
	
	$row = $result->fetch_assoc();
	while($row) {
		echo "Nama : ".$row["asker_name"]."<br>Email : ".$row["asker_email"]."<br>Topic : ".$row["question_topic"]."<br>Content : ".$row["question_content"]."<br>Vote : ".$row["question_vote"]."<br>";
		$sql = "SELECT count(answer_id) FROM answer WHERE question_id=" . $row["question_id"];
		//echo $sql;
		$count = $conn->query($sql);
		$row = $count->fetch_assoc();
		echo "Jumlah jawaban : ".$row["count(answer_id)"]."<br><br>";
		$row = $result->fetch_assoc();
	}
	$conn->close();
	?>
</html>