<?php include 'connect.php';?>

<?php
// Update database
	$question_id = $_REQUEST["question_id"];
	$sql = "UPDATE Question SET vote = vote + 1 WHERE question_id='$question_id'";
	$conn->query($sql);
	$sql = "SELECT vote FROM Question where question_id='$question_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0)
		echo $row["vote"];
	exit;
?>
