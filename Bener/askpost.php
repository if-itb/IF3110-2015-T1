<!DOCTYPE html>
<html>

<head>
	  <title>Simple StackExchange</title>
</head>

<body>

<?php include 'connect.php';?>
	
<?php
	$question_id = $_POST["question_id"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = mysqli_real_escape_string ($conn, $_POST["content"]);

if($question_id>0){
	$sql = "UPDATE Question
	SET name = '$name', email = '$email', topic = '$topic', content = '$content'
	WHERE question_id = '$question_id'
	";
	if (mysqli_query($conn, $sql)) {
		header('Location: answer.php?question_id=' . $question_id);
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}
else{
	$sql = "INSERT INTO Question (name, email, topic, content)
	VALUES ('$name', '$email', '$topic', '$content')";
	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		header('Location: answer.php?question_id=' . $last_id);
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



?>


</body>
</html>
