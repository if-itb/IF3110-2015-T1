<?php

//Mysqli Procedural
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$db_conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function insertQuestion($arr){
	global $db_conn;

	$sql = "INSERT INTO question (name, email, title,content)
			VALUES ('$data[name]', '$data[email]', '$data[title]','$data[content]')";

	$result = mysqli_query($db_conn, $sql); 

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	return $result;
}

function getQuestion($id){
	global $db_conn;

	$query = "SELECT * FROM question WHERE id=$id";
	$result = mysqli_query($db_conn,$query);

	$row = mysqli_fetch_assoc($result);
	return $row;
}


?>
