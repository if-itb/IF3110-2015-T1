<?php
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		$type = $_GET["type"];
		$id = $_GET["id"];
		if(strcmp($type,"question") == 0){
			$query = "UPDATE question SET votes = votes + 1 WHERE question_id=".$id;
			$query_result = mysqli_query($link,$query);
			$ret = mysqli_query($link, "SELECT votes FROM question WHERE question_id=".$id);
			$out = mysqli_fetch_row($ret);
			echo $out[0];
		}
		else if(strcmp($type,"answer") == 0){
			$query = "UPDATE answer SET votes = votes + 1 WHERE answer_id=".$id;
			$query_result = mysqli_query($link,$query);
			$ret = mysqli_query($link, "SELECT votes FROM answer WHERE answer_id=".$id);
			$out = mysqli_fetch_row($ret);
			echo $out[0];
		}
		else{
			die("Unknown type of vote\n");
		}
		
		mysqli_close($link);
	}
?>