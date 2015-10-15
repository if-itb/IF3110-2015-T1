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
	
	$id = $_GET["id"];
	
	$voteval = "SELECT * FROM answers WHERE Answer_ID =".$id;
	$votev = $conn->query($voteval);
	while($row = mysqli_fetch_assoc($votev))
	$vote = $row["Votes"] + 1;
	
	$sql = "UPDATE answers SET Votes=".$vote." WHERE Answer_ID=".$id;

	if ($conn->query($sql) === TRUE) {
	}

	$conn->close();
?>
</body>
</html>
