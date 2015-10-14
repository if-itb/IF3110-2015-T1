<?php 
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		$type = $_GET["type"];
		$id = $_GET["id"];
		if(strcmp($type,"question") == 0){
			$query = "UPDATE question SET votes = votes - 1 WHERE question_id=".$id;
		}
		else if(strcmp($type,"answer") == 0){
			$query = "UPDATE answer SET votes = votes - 1 WHERE answer_id=".$id;
		}
		else{
			die("Unknown type of vote\n");
		}
		
		mysqli_query($link,$query);
		mysqli_close($link);
	}
?>