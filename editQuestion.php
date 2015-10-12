<?php
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		// add new question to database
		$question_id = $_POST["QID"];
		$name = $_POST["Name"];
		$email = $_POST["Email"];
		$topic = $_POST["QuestionTopic"];
		$content = $_POST["Content"];
		
		echo $question_id.PHP_EOL;
		echo $name.PHP_EOL;
		echo $email.PHP_EOL;
		echo $topic.PHP_EOL;
		echo $content.PHP_EOL;
		
		$query = "UPDATE question SET name='".$name."',email='".$email."',topic='".$topic."',content='".$content."' WHERE question_id=".$question_id;
		if(mysqli_query($link,$query)){
			header("Location: index.php");
		}
		else
			die("Error editing the question\n");
		
		mysqli_close($link);
	}
?>