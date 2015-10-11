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
	$rquery = mysqli_query($conn, $query1);
	return $rquery;
}

?>