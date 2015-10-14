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

$sql = "UPDATE Question
SET name = '$name', email = '$email', topic = '$topic', content = '$content'
WHERE question_id = '$question_id'
";
if (mysqli_query($conn, $sql)) {
	header('Location: question.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

</body>
</html>
