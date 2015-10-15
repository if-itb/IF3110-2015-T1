<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 
$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

function upVoteQuestion($idq) { 
	//Insert data to question table
	$query = "UPDATE question SET vote=vote+1 WHERE id='$idq'";
	//Insert data into question table

	$data = mysql_query ($query)or die(mysql_error()); 
	if($data)
	{
	 echo "Success upvote";
	} 
} 


if(isset($_GET['idq'])) { upVoteQuestion($_GET['idq']); }

?>