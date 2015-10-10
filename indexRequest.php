<?php

	include('viewQuestion.php');

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";
	$query = "";

	if(!empty($_GET["search"])){
		$query = "WHERE topic LIKE '%".$_GET["search"]."%' OR content LIKE '%".$_GET["search"]."%'";
	}

	//Create Connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM Questions ".$query." ORDER BY id DESC";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$echoQuestion = $questionDiv;
			$text = $row["content"];
			$truncated = (strlen($text) > 150) ? substr($text, 0, 150) . "..." : $text;
			$echoQuestion = str_replace("{{id}}", $row["id"], $echoQuestion);
			$echoQuestion = str_replace("{{name}}", $row["name"], $echoQuestion);
			$echoQuestion = str_replace("{{topic}}", $row["topic"], $echoQuestion);
			$echoQuestion = str_replace("{{content}}", $truncated, $echoQuestion);
			$echoQuestion = str_replace("{{vote}}", $row["vote"], $echoQuestion);
			$echoQuestion = str_replace("{{answer}}", $row["answer"], $echoQuestion);
			
			echo $echoQuestion;
		}
	}else{
		echo "No Question";
	}
	$conn->close();
?>