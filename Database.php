<?php

include("./Connect.php");

function countVote(){


}

function vote(){


}

function countAnswer($qID){
	global $conn;
	$query = "SELECT answer FROM question WHERE id = $qID";
	$rquery = mysqli_query($conn, $query);
	$result = mysqli_fetch_array($rquery, MYSQLI_ASSOC)["answer"];
	return $result;
}

function getAnswer(){


}

function postAnswer(){


}


function getQuestion($qID){
	global $conn;
	$query = "SELECT * FROM question WHERE id = $qID";
	$rquery = mysqli_query($conn, $query);
	
	$row = mysqli_fetch_array($rquery, MYSQLI_ASSOC);
	return $row;

}

?>