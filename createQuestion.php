<!DOCTYPE html>
<html>
	<head>
		<title> Submitting Question </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		
		<?php 
			$dbHost = 'localhost:3306';
			$dbUser = 'root';
			$dbPass = '';
			$dbName = 'question_answers';
			
			$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
			
			if(!$conn){
				die('Could not connect: ' . mysql_error());
			}
			
			$sql1 = "SELECT MAX(ID) from `questions`";
			
			$result = mysqli_query($conn, $sql1);
			if ($row = $result->fetch_assoc()) {
				$ID = $row["MAX(ID)"] + 1;
			} else {
				echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
			}
			
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$topic = $_REQUEST['topic'];
			$content = $_REQUEST['content'];			
			
			$sql = "INSERT INTO `question_answers`.`questions` (`ID`, `Name`, `Email`, `Topic`, `Content`, `Date`, `Vote`) 
			VALUES (" . $ID . ", '" . $name . "', '" . $email . "', '" . $topic . "', '" . $content . "', CURRENT_TIMESTAMP, '0');";
			
			
			if (mysqli_query($conn, $sql)) {
				$alert = 'window.alert("New record created successfully");';
				echo '<script language="javascript">' . $alert . '</script>';
			} else {
				$alert = 'window.alert("Error: "' . $sql . '\n' . mysqli_error($conn) . ';'; 
				echo '<script language="javascript">' . $alert . '</script>';
			}
			
			header("Refresh: 1; url=index.php");
			die();
			
			mysqli_close($conn);
						
		?>
		
		
	</body>
</html>



