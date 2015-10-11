<?php
	
	require_once ("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	if(isset($_POST['post-button'])){
		$id = $_GET["id"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$topic = $_POST["topic"];
		$content = $_POST["content"];

		$query = "UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id=$id";
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