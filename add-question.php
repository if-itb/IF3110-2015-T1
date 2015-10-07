<?php
	
	include("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	if(isset($_POST['post-button'])){
		if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['topic']) || empty($_POST['content'])){
			echo "Fill all the required field";
		}
		else{
			$name = $_POST["name"];
			$email = $_POST["email"];
			$topic = $_POST["topic"];
			$content = $_POST["content"];

			$query = mysql_query("INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')", $connect);
			if(!$query){
				die('Invalid query: '.mysql_error());
			}
			else{
				header("Location: index.html");
			}
		}
	}

	mysql_close($connect);

?>