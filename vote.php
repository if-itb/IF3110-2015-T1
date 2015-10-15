<?php
	require_once('dbconnect.php');
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// collect value of input field
		$id = $_GET['id'];
		$spin = $_GET['spin'];
		$type = $_GET['type'];
		if ($type==='q'){
			if ($spin==='up'){
				$sql="	UPDATE question
						SET vote = vote+1
						WHERE id = '$id'";
			} else if ($spin==='down'){
				$sql="	UPDATE question
						SET vote = vote-1
						WHERE id = '$id'";
			}
			$conn->query($sql);
			$sql="	SELECT question.vote as vote FROM question WHERE id = '$id'";
		} else if ($type==='a'){
			if ($spin==='up'){
				$sql="	UPDATE answers
						SET vote = vote+1
						WHERE id = '$id'";
			} else if ($spin==='down'){
				$sql="	UPDATE answers
						SET vote = vote-1
						WHERE id = '$id'";
			}
			$conn->query($sql);
			$sql="	SELECT answers.vote as vote FROM answers WHERE id = '$id'";
		}
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			$row=$result->fetch_assoc();
		}
		echo $row['vote'];
		
		$conn->close();
	}
?>