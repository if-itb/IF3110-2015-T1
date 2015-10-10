<?php

	include("viewFormAsk.php");

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "StakeExchange";

	$mock = "value='";


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if(!empty($_GET['id'])){

		$sql = "SELECT * FROM Questions WHERE id=".$_GET["id"];
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$echoMessage = $viewFormAsk;
			$echoMessage = str_replace("{{isEdit}}", "?edit=true&id=".$_GET["id"], $echoMessage);
			$echoMessage = str_replace("{{valName}}", $mock.$row["name"]."'", $echoMessage);
			$echoMessage = str_replace("{{valEmail}}", $mock.$row["email"]."'", $echoMessage);
			$echoMessage = str_replace("{{valTopic}}", $mock.$row["topic"]."'", $echoMessage);
			$echoMessage = str_replace("{{valContent}}", $row["content"], $echoMessage);
			echo $echoMessage;
		}else{
			echo "<a class='link' href='askhere.php'>Refresh</a>";
		}

	}else{
		$echoMessage = $viewFormAsk;
		$echoMessage = str_replace("{{isEdit}}", "", $echoMessage);
		$echoMessage = str_replace("{{valName}}", "", $echoMessage);
		$echoMessage = str_replace("{{valEmail}}", "", $echoMessage);
		$echoMessage = str_replace("{{valTopic}}", "", $echoMessage);
		$echoMessage = str_replace("{{valContent}}", "", $echoMessage);
		echo $echoMessage;
	}

	$conn->close();
?>