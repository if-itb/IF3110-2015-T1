<?php include 'connect.php';?>

<?php
// Update database
	$answer_id = $_REQUEST["answer_id"];
	$sql = "UPDATE Answer SET vote = (vote - 1) WHERE answer_id='$answer_id'";
	$conn->query($sql);
	$sql = "SELECT vote FROM Answer where answer_id='$answer_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0)
		echo $row["vote"];
	exit;
?>
