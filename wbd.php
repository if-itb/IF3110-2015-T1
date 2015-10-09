<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="wbd.css">
	<title>13513018_Steven Andianto</title>
</head>
<body>
	<h1>Simple StackExchange</h1>
	<div align="center" class="container-4">
	<form name:"SearchBox">
	<input type="text" id="search" name="SearchBox" placeholder="Search here...">
	<input type="submit" id="submit" value="Search" name="SearchButton">	
	</form>	
	</div>
	<p id="judul2">Cannot find what you are looking for? <a href="wbd2.php" id="yellow">Ask here</a></p>
	<br>
	<p id="judul">Recently Asked Questions</p>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = NULL;
		if ($_POST['id']=='') {
		$sql = "INSERT INTO question (nama, email, topic, content, date, vote)
		VALUES ('$_POST[InputName]', '$_POST[InputEmail]', '$_POST[InputQuestionTopic]', '$_POST[InputContent]',NOW(),0)";
		}
		else {$sql = "UPDATE question
				SET
					nama='$_POST[InputName]',
					email='$_POST[InputEmail]',
					topic='$_POST[InputQuestionTopic]',
					content='$_POST[InputContent]'
				WHERE
					id = $_POST[id]";
		}
		if(mysqli_query($conn,$sql))
		{ 
		echo "New record created successfully!";
		}
		}
		$q = "SELECT * from question";
		if (!$result = $conn -> query($q)){
				die('Error Query['.$conn -> error.']');
		}
		while($row = $result -> fetch_assoc()){
			echo '<div class="content">';
			echo	'<table>';
			echo	'<hr>';
			echo	'<tr>';
			echo	'<td id="td1">'.$row['vote'].'<br>Votes</td>';
			echo	'<td id="td1">0<br>Answers</td>';
			echo 	'<td id="td2">'.$row['topic'].'</td>';
			echo	'<td id="td3">asked by <a href="wbd2.php" id="blue">'.$row['nama'].'</a> | <a href="wbd2.php?id='.$row['id'].'" id="yellow">edit</a> | <a href="wbd2.php" id="red">delete</a></td>';
			echo	'</tr>';
			echo	'</table>';
			echo	$row['id'];
			echo    '</div>';
			}
		mysqli_close($conn);
		?> 
		
</body>

</html>
