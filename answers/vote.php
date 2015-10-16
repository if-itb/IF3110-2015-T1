<?php 
	$conn = mysqli_connect("localhost","root","","stackoverflow");
	if(!$conn)
		die("Connection failed: " .mysqli_connect_error());
	
	$type = $_GET['type'];
	$question_no = intval($_GET['question_no']);
	$answer_no = intval($_GET['answer_no']);
	$updown = $_GET['updown'];
	
	if ($type == "question") 
		$sql = "SELECT * FROM questions WHERE no=$question_no";	 
	else if($type == "answer") 
		$sql = "SELECT * FROM answers WHERE no=$answer_no AND question_no=$question_no";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$vote = $row['vote'];	
	
	if($updown == "up") $vote++;
	else if($updown == "down") $vote--;
	
	if($type == "question") {
		$sql = "UPDATE questions SET vote=$vote WHERE no=$question_no";
	} 
	else if($type == "answer") {
		$sql = "UPDATE answers SET vote=$vote WHERE no=$answer_no AND question_no=$question_no";
	}
	
	if(mysqli_query($conn,$sql))
		echo "$vote";
	else 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	mysqli_close($conn);
?>