<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="wbd.css">
	<title>13513018_Steven Andianto</title>
</head>
<body>
	<h1>Search Result</h1>
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
		$sql = "SELECT * FROM question WHERE topic LIKE '%$_POST[SearchBox]%' OR (content LIKE '%$_POST[SearchBox]%')";
		}
		if (!$result = $conn -> query($sql)){
				die('Error Query['.$conn -> error.']');
		}
		while($row = $result -> fetch_assoc()){
			echo '<div class="content">';
			echo	'<table>';
			echo	'<hr>';
			echo	'<tr>';
			echo	'<td id="td1">'.$row['vote'].'<br>Votes</td>';
			echo	'<td id="td1">'.$row['answers'].'<br>Answers</td>';
			echo 	'<td id="td2"><a href="wbd3.php?id='.$row['id'].'" id="blue">'.$row['topic'].'</a></td>';
			echo	'<td id="td3">asked by <blue>'.$row['nama'].'</blue>  | <a href="wbd2.php?id='.$row['id'].'"><yellow>edit</yellow></a> | <a href="wbd.php?id='.$row['id'].'"><red>delete</red></a></td>';
			echo	'</tr>';\
			echo	'</table>';
			echo    '</div>';
			}
		mysqli_close($conn);
		?> 
		
</body>

</html>

