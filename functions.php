<?php
$tbl_answer = $tbl_question = "";


function connectDB(){
	if(file_exists("db.php")){
		require 'db.php';
	} else {
		die("Error");
	}
	$GLOBALS['tbl_answer'] = $tbl_answer;
	$GLOBALS['tbl_question'] = $tbl_question;
	$con = mysqli_connect("$host","$user","$passdb","$db");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $con;
}
?>