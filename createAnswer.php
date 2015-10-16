<?php 
	$dbHost = 'localhost:3306';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'question_answers';
	
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	
	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$questionID = $_POST['id'];
	$content = $_POST['content'];			
	
	$sql1 = "SELECT MAX(ID) from `answers`";
	
	$result = mysqli_query($conn, $sql1);
	if ($row = $result->fetch_assoc()) {
		$ID = $row["MAX(ID)"] + 1;
	} else {
		echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
	}
	
	$sql = "INSERT INTO `question_answers`.`answers` (`ID`, `QuestionID`, `Name`, `Email`, `Content`, `Date`, `Vote`) 
	VALUES ('" . $ID . "', '" . $questionID . "', '" . $name . "', '" . $email . "', '" . $content . "', CURRENT_TIMESTAMP, '0')";
	
	if (mysqli_query($conn, $sql)) {
		$alert = 'window.alert("New record created successfully");';
		echo '<script language="javascript">' . $alert . '</script>';
	} else {
		$alert = 'window.alert("Error: "' . $sql . '\n' . mysqli_error($conn) . ';'; 
		echo '<script language="javascript">' . $alert . '</script>';
	}
	
	header("Refresh: 1; url=detail.php?id=$questionID");
	die();
	
	mysqli_close($conn);
				
?>


