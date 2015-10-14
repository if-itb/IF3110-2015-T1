<!DOCTYPE html>
<html>
<head>

<?php include 'connect.php';?>
	
<?php
	$question_id = $_POST["question_id"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];

if($question_id>0){
	$sql = "UPDATE Question
	SET name = '$name', email = '$email', topic = '$topic', content = '$content'
	WHERE question_id = '$question_id'
	";
}
else{
	$sql = "INSERT INTO Question (name, email, topic, content)
	VALUES ('$name', '$email', '$topic', '$content')";
}

if (mysqli_query($conn, $sql)) {
	header('Location: answer.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

</body>
</html>
