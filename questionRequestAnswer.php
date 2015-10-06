<?php 
	include("viewAnswer.php");

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

	$sql = "SELECT COUNT(*) AS total FROM Answers WHERE qID=".$idGET;
	$result = $conn->query($sql);
	$countA = $result->fetch_assoc();

	echo '<h1 class="tag">'.$countA['total'].' Answer</h1>';

	$sql = "SELECT * FROM Answers WHERE qID=".$idGET;
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$echoQuestion = $answerDiv;
			$echoQuestion = str_replace("{{id}}", $row["id"], $echoQuestion);
			$echoQuestion = str_replace("{{name}}", $row["name"], $echoQuestion);
			$echoQuestion = str_replace("{{content}}", $row["content"], $echoQuestion);
			$echoQuestion = str_replace("{{vote}}", $row["vote"], $echoQuestion);
			$echoQuestion = str_replace("{{date}}", $row["date"], $echoQuestion);
			echo $echoQuestion;
		}
	}else{
		echo "No Answer Yet";
	}
	$conn->close();
?>