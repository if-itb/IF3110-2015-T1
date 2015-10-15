<?php
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		// add new question to database
		$question_id = mysqli_fetch_assoc(mysqli_query($link,"SELECT MAX(question_id) FROM question"))['MAX(question_id)'] + 1;
		$name = mysqli_real_escape_string($link, $_POST["Name"]);
		$email = mysqli_real_escape_string($link, $_POST["Email"]);
		$topic = mysqli_real_escape_string($link, $_POST["QuestionTopic"]);
		$content = mysqli_real_escape_string($link, $_POST["Content"]);
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