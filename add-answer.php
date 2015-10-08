<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id = $_POST["id"];
	$id = mysql_real_escape_string($id);
	echo $id;
	$name = $_POST["name"];
	$name = mysql_real_escape_string($name);
	$email = $_POST["email"];
	$email = mysql_real_escape_string($email);
	$content = $_POST["content"];
	$content = mysql_real_escape_string($content);
	$sql = "INSERT INTO answer (id_question, username, email, content) 
	VALUES ('$id', '$name', '$email', '$content')";

	if ($con->query($sql) === TRUE) {
	    header('Location: http://127.0.0.1:8080/stack_exchange/show-answer.php?id='. $id);
		exit;
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}
	mysqli_close($con);
?>