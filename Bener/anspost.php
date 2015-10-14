<!DOCTYPE html>
<html>
<head>

<?php include 'connect.php';?>
	
<?php
$question_id = $_POST['question_id'];
$name = $_POST["name"];
$email = $_POST["email"];
$content = $_POST["content"];

$sql = "INSERT INTO Answer (question_id, name, email, content)
VALUES ('$question_id', '$name', '$email', '$content')";//belum ada answer_id

if (mysqli_query($conn, $sql)) {
	echo $question_id; //TODO ini masih salah
	$location = 'Location: answer.php?question_id=' . $question_id;
	echo $location;

	//header('$location');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

</body>
</html>
