<?php

include("Connect.php");

/* Fungsi buat Question */


function countAnswer($qID){
	global $conn;
	$query = "SELECT COUNT(*) FROM answer WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	$result = mysqli_fetch_array($rquery, MYSQLI_ASSOC);
	
	print_r($result);
	return $result;
	
}

function getQuestion(){
	global $conn;
	$query = "SELECT * FROM question";
	$rquery = mysqli_query($conn, $query);
	$questions = array();
	
	while ($row = mysqli_fetch_array($rquery, MYSQLI_ASSOC)){
		$questions[] = $row;
	}
	
	return $questions;

}

function getQuestionByID($qID){
	global $conn;
	$query = "SELECT * FROM question WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	$result = mysqli_fetch_array($rquery, MYSQLI_ASSOC);
	return $result;
}

/* Fungsi buat Answer */

function getAnswer($qID){
	global $conn;
	$query = "SELECT * FROM answer WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	$answers = array();
	
	while ($row = mysqli_fetch_array($rquery, MYSQLI_ASSOC)){
		$answers[] = $row;
	}
	
	return $answers;

}

function getAnswerByID($aID){
	global $conn;
	$query = "SELECT * FROM answer WHERE a_id = $aID";
	$rquery = mysqli_query($conn, $query);
	$result = mysqli_fetch_array($rquery, MYSQLI_ASSOC);
	return $result;
}

/* Fungsi Vote */
function voteUpQuestion($qID){
	global $conn;
	$question = getQuestionByID($qID);
	$question["q_vote"] = $question["q_vote"] + 1;
	
	$query = "UPDATE question SET q_vote = ".$question["q_vote"]." WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	return $rquery;
	
}

function voteDownQuestion($qID){
	global $conn;
	$question = getQuestionByID($qID);
	$question["q_vote"] = $question["q_vote"] - 1;
	
	$query = "UPDATE question SET q_vote = ".$question["q_vote"]." WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	return $rquery;
}

function voteUpAnswer($aID){
	global $conn;
	$answer = getAnswerByID($aID);
	$answer["a_vote"] = $answer["a_vote"] + 1;
	
	$query = "UPDATE answer SET a_vote = ".$answer["a_vote"]." WHERE a_id = $aID";
	$rquery = mysqli_query($conn, $query);
	return $rquery;
}

function voteDownAnswer($aID){
	global $conn;
	$answer = getAnswerByID($aID);
	$answer["a_vote"] = $answer["a_vote"] - 1;
	
	$query = "UPDATE answer SET a_vote = ".$answer["a_vote"]." WHERE a_id = $aID";
	$rquery = mysqli_query($conn, $query);
	return $rquery;
	
}


/* Delete Question */
function deleteQuestion($qID){
	global $conn;
	$query = "DELETE FROM question WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	deleteAnswer($qID);
	
	return $rquery;
}

function deleteAnswer($qID){
	global $conn;
	$query = "DELETE FROM answer WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	return $rquery;
}

/* Search Question */
function searchQuestion($key){
	global $conn;
	$query = "SELECT * FROM question WHERE q_topic LIKE '%$key%' OR q_content LIKE '%$key%'";
	$rquery = mysqli_query($conn, $query);
	$questions = array();
	
	while ($row = mysqli_fetch_array($rquery, MYSQLI_ASSOC)){
		$questions[] = $row;
	}
	
	return $questions;
}


?>