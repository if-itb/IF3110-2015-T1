<?php

include 'header.php';
$conn = connectToDatabase();

$move = $_GET["move"];
$target = $_GET["target"];
$id = $_GET["id"];

if(strcmp($target,"questionVote") == 0) {
	if($move == "up") {
		upQuestionVote($id, $conn);
	} else if($move == "down") {
		downQuestionVote($id, $conn);
	}
} else {
	if($move == "up") {
		upAnswerVote($id, $conn);
	} else if($move == "down") {
		downAnswerVote($id, $conn);
	}
}

function upQuestionVote($id, $conn) {
	$sql = "Update question Set question_vote=question_vote+1 Where question_id=".$id;
	if (mysqli_query($conn, $sql)) {
		$sql = "Select question_vote From question Where question_id=".$id;
		$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		echo $row["question_vote"];
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

function downQuestionVote($id, $conn) {
	$sql = "Select question_vote From question Where question_id=".$id;
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	if($row["question_vote"] <= 0) {
		echo $row["question_vote"];
	} else {
		$sql = "Update question Set question_vote=question_vote-1 Where question_id=".$id;
		if (mysqli_query($conn, $sql)) {
			$sql = "Select question_vote From question Where question_id=".$id;
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			echo $row["question_vote"];
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

function upAnswerVote($id, $conn) {
	$sql = "Update answer Set answer_vote=answer_vote+1 Where answer_id=".$id;
	if (mysqli_query($conn, $sql)) {
		$sql = "Select answer_vote From answer Where answer_id=".$id;
		$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		echo $row["answer_vote"];
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

function downAnswerVote($id, $conn) {
	$sql = "Select answer_vote From answer Where answer_id=".$id;
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	if($row["answer_vote"] <= 0) {
		echo $row["answer_vote"];
	} else {
		$sql = "Update answer Set answer_vote=answer_vote-1 Where answer_id=".$id;
		if (mysqli_query($conn, $sql)) {
			$sql = "Select answer_vote From answer Where answer_id=".$id;
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			echo $row["answer_vote"];
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}


include 'footer.php';
closeDatabase($conn);

?>