<?php
	
	require_once ("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	if(isset($_POST['post-answer'])){
		$id_question = $_GET["id"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$content = $_POST["content"];

		$query = "INSERT INTO answer (id_question, name, email, content) VALUES ($id_question,'$name', '$email', '$content')";
		$result = mysql_query($query, $connect);
		if(!$result){
			die('Invalid query: '.mysql_error());
		}
		else{
			$Location = sprintf("Location: question.php?id=%d",mysql_escape_string($_GET["id"]));
			header($Location); // redirect to question.php
		}
	}

	mysql_close($connect);

?>