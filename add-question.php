<?php
	
	require_once ("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	if(isset($_POST['post-button'])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$topic = $_POST["topic"];
		$content = $_POST["content"];

		$query = "INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
		$result = mysql_query($query, $connect);
		if(!$result){
			die('Invalid query: '.mysql_error());
		}
		else{
			header("Location: index.php");
		}
	}

	mysql_close($connect);

?>