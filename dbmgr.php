<?php

$servername = "localhost";
$username = "IF3110";
$password = "IF3110";
$dbname = "SimpleStackExchange";

//return qid jika berhasil
//return 0 jika gagal
function submitQuestion($Name,$Email,$QuestionTopic,$Content) {
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return 0;
	}

	$sql = "INSERT INTO Question (AuthorName, Email, QuestionTopic, Content)
	VALUES ('$Name', '$Email', '$QuestionTopic', '$Content')";

	if ($conn->query($sql) === TRUE) {
		echo "<p>New record created successfully</p>";
		return $conn->insert_id;
	} else {
		echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
		return 0;
	}

	
	return 1;
}

?>
