<?php
	
	require_once ("connection.php");

	$db = mysql_select_db("tubeswbd", $connect);

	if(isset($_POST['search-button'])){
		
		$keyword = $_GET['keyword'];

		$query = "SELECT * FROM question WHERE topic LIKE '%$keyword%' OR content LIKE '%$keyword%'";

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