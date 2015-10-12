<?php
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		// add new question to database
		$question_id = mysqli_fetch_assoc(mysqli_query($link,"SELECT MAX(question_id) FROM question"))['MAX(question_id)'] + 1;
		$name = $_POST["Name"];
		$email = $_POST["Email"];
		$topic = $_POST["QuestionTopic"];
		$content = $_POST["Content"];
		$votes = 0;
		
		$query = "INSERT INTO question(question_id,name,email,topic,content,votes) VALUES ('".$question_id."','".$name."','".$email."','".$topic."','".$content."','".$votes."')";
		if(mysqli_query($link,$query)){
			header("Location: index.php");
		}
		else
			die("Error creating new question\n");
		
		mysqli_close($link);
	}
?>