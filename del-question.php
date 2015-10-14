<?php
	
	include 'dbfunctions.php';
	$conn=ConnectToDatabase();

	if(isset($_GET["del"])) {
		$id = $_GET["del"];

		$sql = "DELETE FROM Answer WHERE question_id='$id'";

		if (!mysqli_query($conn, $sql)) {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		$sql = "DELETE FROM Question WHERE question_id='$id'";

		if (!mysqli_query($conn, $sql)) {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		echo $id;
		echo "delete sucess";
		header("Location: question-list.php");
	}

?>