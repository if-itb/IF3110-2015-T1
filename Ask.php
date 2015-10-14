<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "question_answer";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	$db = mysql_select_db($dbname, $conn);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	if(isset($_POST['question'])){
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Topic = $_POST['Topic'];
		$Content = $_POST['Content'];
		
		$sql = "INSERT INTO question (Q_Name, Q_Email, Q_Topic, Q_Content) VALUES ('$Name', '$Email', '$Topic', '$Content')";
		$result = mysql_query($sql, $conn);
		
		if(!$result){
			die("Invalid query: ".mysql_error());
		}
		else{
			header("Location: index.php");
		}
	} else if(isset($_POST['edit'])){
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Topic = $_POST['Topic'];
		$Content = $_POST['Content'];
		$ID = $_POST['id'];
		
		$sql = "UPDATE question SET Q_Name = '$Name', Q_Email = '$Email', Q_Topic = '$Topic', Q_Content = '$Content' WHERE Q_id = '$ID'";
		$result = mysql_query($sql, $conn);
		
		if(!$result){
			die("Invalid query: ".mysql_error());
		}
		else{
			header("Location: index.php");
		}
	}
	
	mysql_close($conn);
	
?>