<?php
	$kind = $_GET["kind"];
	$isup = $_GET["isup"];
	$id = $_GET["id"];

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "error";
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "";
	$value = "";

	if($kind == "question"){
		if($isup == "true"){
			$value = "vote=vote+1 ";
		}else{
			$value = "vote=vote-1 ";
		}
		$sql = "UPDATE Questions SET ".$value." WHERE id=".$id;
	}else if($kind == "answer"){
		if($isup == "true"){
			$value = "vote=vote+1 ";
		}else{
			$value = "vote=vote-1 ";
		}
		$sql = "UPDATE Answers SET ".$value." WHERE id=".$id;
	}

	if ($conn->query($sql) === TRUE) {
	    echo "success";
	} else {
	    echo "error";
	}

?>