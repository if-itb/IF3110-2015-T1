<html>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database_of_questions";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$qid = $_GET["id"];
	$sql = "DELETE FROM questions WHERE Question_ID=".$qid;
	
	if ($conn->query($sql) === TRUE) {
		$sql2 = "DELETE FROM answers WHERE Question=".$qid;
		if ($conn->query($sql2) === TRUE) {
			header('Location: index.php');
		}
	}
	$conn->close();
?>
</body>
</html>
