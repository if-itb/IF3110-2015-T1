<?php
	$link = mysqli_connect("localhost","root","","stack_exchange");
	
	if(!$link){
		die("Error: Unable to connect to database\n");
	}
	else{
		// add new answer for current question
		$question_id = $_POST["QID"];
		$answer_id = mysqli_fetch_assoc(mysqli_query($link,"SELECT MAX(answer_id) FROM answer"))['MAX(answer_id)'] + 1;
		$name = $_POST["Name"];
		$email = $_POST["Email"];
		$content = $_POST["Content"];
		$votes = 0;

		$query = "INSERT INTO answer(answer_id,question_id,name,email,content,votes) VALUES ('".$answer_id."','".$question_id."','".$name."','".$email."','".$content."','".$votes."')";
		$query2 = "UPDATE question SET num_answers= num_answers+1 WHERE question_id=".$question_id;
		if(mysqli_query($link,$query)){
			//back to current question page
			header("Location: question.php?id=".$question_id); 
		}
		else{
			die("Error creating answer");
		}
		
		if(mysqli_query($link,$query2)){
			//back to current question page
			header("Location: question.php?id=".$question_id); 
		}
		else
			die("Error update total answers\n");
		mysqli_close($link);
	}
?>