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
	
	if(isset($_POST['answer'])){
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Content = $_POST['Content'];
		$ID = $_GET["id"];
		
		$sql = "INSERT INTO answer (A_Name, A_Email, A_Content, Q_id) VALUES ('$Name', '$Email', '$Content', '$ID')";
		$result = mysql_query($sql, $conn);
		
		if(!$result){
			die("Invalid query: ".mysql_error());
		}
		else{
			header("Location: Answer.php?id=$ID");
		}
	} 
	mysql_close($conn);
?>