<?php
	
	include('viewSingleQuestion.php');

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";
	$idGET = htmlspecialchars($_GET["id"]);

	//Create Connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM Questions WHERE id=".$idGET;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($result->num_rows > 0){
		$echoQuestion = $singleQuestion;
		$questionURL = "question.php?id=". $row["id"];
		$echoQuestion = str_replace("{{id}}", $row["id"], $echoQuestion);
		$echoQuestion = str_replace("{{name}}", $row["name"], $echoQuestion);
		$echoQuestion = str_replace("{{topic}}", $row["topic"], $echoQuestion);
		$echoQuestion = str_replace("{{questionURL}}", $questionURL, $echoQuestion);
		$echoQuestion = str_replace("{{content}}", $row["content"], $echoQuestion);
		$echoQuestion = str_replace("{{vote}}", $row["vote"], $echoQuestion);
		$echoQuestion = str_replace("{{answer}}", $row["answer"], $echoQuestion);
		$echoQuestion = str_replace("{{date}}", $row["date"], $echoQuestion);
		echo $echoQuestion;
	}else{
		echo "No Question";
	}

	/*echo '<div class="containerAnswer">
		<h1 class="tag">'.$row[answer].' Answer</h1>';*/

	$conn->close();

?>