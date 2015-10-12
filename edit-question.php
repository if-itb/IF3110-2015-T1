<?php
	
	include 'dbfunctions.php';
	$conn=ConnectToDatabase();

	if(isset($_POST['edit_question'])) {
		$name = $_POST["question_name"]; 
		$email = $_POST["question_email"]; 
		$topic = $_POST["question_topic"]; 
		$content = $_POST["question_content"]; 
		$id = $_GET["id"];

		$name_temp = mysqli_real_escape_string($conn,$name);
		$email_temp = mysqli_real_escape_string($conn,$email);
		$topic_temp = mysqli_real_escape_string($conn,$topic);
		$content_temp = mysqli_real_escape_string($conn,$content);
		
		$sql = "UPDATE Question SET question_name='$name', question_email='$email', question_topic='$topic', question_content='$content', question_date= now() WHERE question_id='$id'";

		if (!mysqli_query($conn, $sql)) {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		header("Location: question-page.php?id=". $id);
	}

?>