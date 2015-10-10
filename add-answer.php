<?php
		include 'dbfunctions.php';
		$conn=ConnectToDatabase();

		if(isset($_POST['submit_answer'])) {
			$answer_name = $_POST["answer_name"]; 
			$answer_email = $_POST["answer_email"];  
			$answer_content = $_POST["answer_content"];
			$id = $_GET["id"];

			$name_temp = mysqli_real_escape_string($conn,$answer_name);
			$email_temp = mysqli_real_escape_string($conn,$answer_email);
			$content_temp = mysqli_real_escape_string($conn,$answer_content);
			$id_temp = mysqli_real_escape_string($conn,$id);

			
			$sql = "INSERT INTO Answer (question_id, answer_name, answer_email, answer_content, answer_vote)
			VALUES ('$id_temp', '$name_temp', '$email_temp', '$content_temp', 0)";

			if (!mysqli_query($conn, $sql)) {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			$answer_id = mysqli_insert_id($conn);
			
			header('Location: question-page.php?id=<?php echo $id ?>');
		}
	

?>