<!DOCTYPE html>
<html>
<head>
	
<?php include 'connect.php';?>
	
<?php
$question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);

$sql = "DELETE FROM question
WHERE question_id=$question_id";
if (mysqli_query($conn, $sql)) {
	echo "Alhamdulillah";
	header('Location: question.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

</body>
</html>
