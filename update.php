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

	$sql = "UPDATE questions SET Name='".$_GET["Name"]."',Email='".$_GET["Email"]."',Topic='".$_GET["Topic"]."',Content='".$_GET["Content"]."' WHERE Question_ID=".$_GET["QID"];

	if ($conn->query($sql) === TRUE) {
		header('Location: index.php');
	}else{
		echo $sql;
	}

	$conn->close();
?>
</body>
</html>
