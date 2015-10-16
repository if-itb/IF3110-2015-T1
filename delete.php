<?php
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		// delete selected question to database
		$question_id = $_GET["id"];
		
		$query = "DELETE FROM question  WHERE question_id=".$question_id;
		if(mysqli_query($link,$query)){
			header("Location: index.php");
		}
		else
			die("Error deleting the question\n");
		
		mysqli_close($link);
	}
?>