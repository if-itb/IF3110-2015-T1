<!DOCTYPE html>
<html>
	<head>
		<title> Index </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		<form action="Search.php">
			<input class="searchBox" type="text" name="questions">
			<input type="submit" class="submitButton" value="Search">
		</form>
		<p>
			Cannot find what you are looking for? <a href="ask.php">Ask here</a>
			<br>
			<br>
		</p>
		
		<h3>Recently Asked Question</h3>
		
		<div class="left">
			<?php
				$dbHost = 'localhost:3306';
				$dbUser = 'root';
				$dbPass = '';
				$dbName = 'question_answers';
				
				$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
				
				if(!$conn){
					die('Could not connect: ' . mysql_error());
				}
				
				$sql = "SELECT * FROM `questions`";
				
				$result = mysqli_query($conn, $sql);
				while($row = $result->fetch_assoc()){
					$rowCount = 0; //refresh from previous result
					echo 'Votes: ' . $row["Vote"]. '<br>';
					$innerSQL = "SELECT * FROM `answers` WHERE QuestionID = " . $row["ID"]; 
					$innerResult = mysqli_query($conn, $innerSQL);
					if($answer = $innerResult->fetch_assoc()){
						$rowCount = mysqli_num_rows($innerResult);
					}
					echo 'Answers: ' . $rowCount . '<br>';
					echo 'Topic: <a href="detail.php?id=' . $row["ID"] . '">' . $row["Topic"] . '</a>' . '<br>';
					echo 'Name: ' . $row["Name"]. '<br>';
					echo 'Date: ' . $row["Date"]. '<br>';
					echo '<form method="post" action="ask.php">';
					echo '<input name="id" type="hidden" value=' . $row["ID"] . '>';
					echo '<button value=' . $row["ID"] . '>Edit</button>';
					echo '</form>'; 
					echo '<form method="post" action="delete.php">';
					echo '<button name="id" type="submit" value=' . $row["ID"] . ' onclick="confirmDelete()">Delete</button>';
					echo '</form>'; 
					echo '<br>';
				}
				
				mysqli_close($conn);
			?>
			
			<script>
				function confirmDelete() {
				  var x = confirm("Are you sure you want to delete?");
				  if (x)
					  return true;
				  else
					return false;
				}
			</script>
			
		</div>
	</body>
</html>
