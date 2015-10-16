<?php
	$dbHost = 'localhost:3306';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'question_answers';
	
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	
	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}
	
	$QuestionID = $_POST["id"];
	$sql1 = "DELETE FROM questions WHERE ID = " . $QuestionID;
	if (mysqli_query($conn, $sql1)) {
		$sql2 = "DELETE FROM `question_answers`.`answers` WHERE `answers`.`QuestionID` = " . $QuestionID;
		if(mysqli_query($conn, $sql2)){
			$alert = 'window.alert("Record deleted successfully");';
			echo '<script language="javascript">' . $alert . '</script>';
		} else {
			echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
	
	
	header("Refresh: 1; url=index.php");
	die();
	
	mysqli_close($conn);
				
	
			
?>
