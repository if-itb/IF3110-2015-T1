<!DOCTYPE html>
<html>
<head>
	
<?php include 'connect.php';?>
	
<?php
$question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);

$sql = "SELECT vote, topic, content, email FROM Question";

if (mysqli_query($conn, $sql)) {
	echo "Alhamdulillah";
	//header('Location: answer.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

</body>
</html>
