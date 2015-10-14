<?php
	
	include 'dbfunctions.php';
	$conn=ConnectToDatabase();

	if(isset($_POST['submit_question'])) {
		$name = $_POST["question_name"]; 
		$email = $_POST["question_email"]; 
		$topic = $_POST["question_topic"]; 
		$content = $_POST["question_content"]; 
		

		$name_temp = mysqli_real_escape_string($conn,$name);
		$email_temp = mysqli_real_escape_string($conn,$email);
		$topic_temp = mysqli_real_escape_string($conn,$topic);
		$content_temp = mysqli_real_escape_string($conn,$content);
		$date = mysqli_real_escape_string($conn,$date);
		
		$sql = "INSERT INTO Question (question_name, question_email, question_topic, question_content, question_vote, question_date)
		VALUES ('$name_temp', '$email_temp', '$topic_temp', '$content_temp', 0,  now())";

		if (!mysqli_query($conn, $sql)) {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$id = mysqli_insert_id($conn);

		header("Location: question-page.php?id=". $id);
	}

?>