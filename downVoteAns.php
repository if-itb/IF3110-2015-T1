<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 
$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

function downVoteAnswer($ida) { 
	//Insert data to question table
	$query = "UPDATE answer SET vote=vote-1 WHERE idans='$ida'";
	//select vote from question table
	$retquery ="SELECT vote FROM answer WHERE idans='$ida' ";
	$data = mysql_query ($query)or die(mysql_error());
	$retdata = mysql_query ($retquery)or die(mysql_error());
	$row = mysql_fetch_array($retdata, MYSQL_ASSOC); 
	if($data )
	{
	 	echo $row['vote'];
	} 
} 


if(isset($_GET['ida'])) { downVoteAnswer($_GET['ida']); }

?>