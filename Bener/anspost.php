<!DOCTYPE html>
<html>
<head>

<?php include 'connect.php';?>
	
<?php
$question_id = $_POST['question_id'];
$name = $_POST["name"];
$email = $_POST["email"];
$content = $_POST["content"];

//if($answer_id>0){
	/*$sql = "UPDATE Answer
	SET name = '$name', email = '$email', content = '$content'
	WHERE answer_id = '$answer_id'
	";
	if (mysqli_query($conn, $sql)) {
		header('Location: answer.php?question_id=' . $question_id);
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}*/
	//echo "Case not handled yet, to edit";

//}
//else{
	$sql = "INSERT INTO Answer (question_id, name, email, content)
	VALUES ('$question_id', '$name', '$email', '$content')";
	if (mysqli_query($conn, $sql)) {
		echo $question_id;
		//$last_id = mysqli_insert_id($conn);
		header('Location: answer.php?question_id=' . $question_id);
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
//}

?>

</body>
</html>
