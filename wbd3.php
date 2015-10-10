<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="wbd1.css">
	<title>13513018_Steven Andianto</title>
</head>
<body>
	<h1>Simple StackExchange</h1>
	<div class="content">
	<br>
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
		if(isset($_POST['id'])) {
				$id = $_POST['id'];
				$conn ->query("SELECT * FROM question WHERE id = $id");

			}
		}
		$q = "SELECT * from question";
		if (!$result = $conn -> query($q)){
				die('Error Query['.$conn -> error.']');
		}
		//QUESTION
	while($row = $result -> fetch_assoc()){
	if($_GET['id'] == $row['id']){
	echo '<p id="judul">'.$row['topic'].'</p>';
	echo '<hr>';
	echo '<table>';
	echo	'<tr>';
	echo	'<td id="td4">'.$row['vote'].'</td>';
	echo	'<td id="td5">'.$row['content'].'</td>';
	echo	'</tr>';
	echo	'<tr>';
	echo	'<td id="td6" colspan ="2">asked by <blue>'.$row['nama'].'</blue> at '.$row['date'].' | <a href="wbd2.php?id='.$row['id'].'"><yellow>edit</yellow></a> | <a href="wbd.php?id='.$row['id'].'"><red>delete</red></a></td>';
	echo	'</tr>';
	echo '</table>';
}
}
	?>
	<?php
		//ANSWER
	?>
	</div>
	<div class="content">
	<br>
	<p id="judul">1 Answer</p>
	<?php
	echo '<hr>';
	echo '<table>';
	echo	'<tr>';
	echo	'<td id="td4">0</td>';
	echo	'<td id="td5">Content Jawaban</td>';
	echo	'</tr>';
	echo	'<tr>';
	echo	'<td id="td6" colspan ="2">nama</td>';
	echo	'</tr>';
	echo '</table>';
	echo '<hr>';
	?>
	</div>
	<p id="judulbesar">Your Answer</p>
	<form name:"Answer" action="wbd3.php" method="post">
	<input type="text" id="textbox" name="AnswerName" placeholder=" Name" >
	<input type="text" id="textbox" name="AnswerEmail" placeholder=" Email">
	<textarea id="textarea" name="AnswerContent" placeholder=" Content"></textarea>		
	<input type="submit" id="post" name="Post" value="Post">
	</form>
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
		$sql = "INSERT INTO answer (name, email, content, date, vote)
		VALUES ('$_POST[AnswerName]', '$_POST[AnswerEmail]', '$_POST[AnswerContent]',NOW(),0)";
		if(mysqli_query($conn,$sql))
		{ 
		echo "New record created successfully!";
		}
		}
		/*else if($_SERVER['REQUEST_METHOD'] == 'GET'){
			if(isset($_GET['id'])) {
				$id = $_GET['id'];
				$conn ->query("DELETE FROM question WHERE id = $id");
			}
		}*/
		$q = "SELECT * from answer";
		if (!$result = $conn -> query($q)){
				die('Error Query['.$conn -> error.']');
		}
		while($row = $result -> fetch_assoc()){
			echo '<hr>';
			echo '<table>';
				echo	'<tr>';
				echo	'<td id="td4">'.$row['vote'].'</td>';
				echo	'<td id="td5">'.$row['content'].'</td>';
				echo	'</tr>';
				echo	'<tr>';
				echo	'<td id="td6" colspan ="2">answered by'.$row['name'].' at '.$row['date'].'</td>';
				echo	'</tr>';
			echo '</table>';
			echo '<hr>';
		}
		mysqli_close($conn);
		?> 
		
		
	
</body>
