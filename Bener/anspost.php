<!DOCTYPE html>
<html>

<head>
	  <title>Simple StackExchange</title>
</head>

<body>

<?php include 'connect.php';?>
	
<?php
$question_id = $_POST['question_id'];
$name = $_POST["name"];
$email = $_POST["email"];
$content = $_POST["content"];

	$sql = "INSERT INTO Answer (question_id, name, email, content)
	VALUES ('$question_id', '$name', '$email', '$content')";
	if (mysqli_query($conn, $sql)) {
		echo $question_id;
		header('Location: answer.php?question_id=' . $question_id);
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>

</body>
</html>
