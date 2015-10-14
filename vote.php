<?php
	
	include 'dbfunctions.php';
	$conn=ConnectToDatabase();

	$id = $_GET['id'];
	$qa = $_GET['qa'];
	$updown = $_GET['updown'];

	if($qa=="question") {
		$result = GetQuestion($id);
		$vote = $result["question_vote"];
		if($updown=="up") {
			$vote++;
		}
		else {
			$vote--;
		}

		$sql = "UPDATE Question SET question_vote=$vote WHERE Question.question_id=$id";
		if (!mysqli_query($conn, $sql)) {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	}	
    	$result = GetQuestion($id);
		echo $result["question_vote"];
	}
	else { //qa="answer"
		$result = GetAnswer($id);
		$vote = $result["answer_vote"];
		if($updown=="up") {
			$vote++;
		}
		else {
			$vote--;
		}
		
		$sql = "UPDATE Answer SET answer_vote=$vote WHERE Answer.answer_id=$id";
		if (!mysqli_query($conn, $sql)) {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	}
		$result = GetAnswer($id);
		echo $result["answer_vote"];
	}



?>