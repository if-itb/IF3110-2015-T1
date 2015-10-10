<?php

include("Connect.php");

/* Fungsi buat Question */


function countAnswer($qID){
	
	
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

function getAnswer(){


}

/* Delete Question */
function deleteQuestion($qID){
	global $conn;
	$query = "DELETE FROM question WHERE q_id = $qID";
	$rquery = mysqli_query($conn, $query);
	return $rquery;
}	
?>