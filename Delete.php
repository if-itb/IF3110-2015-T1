<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 


function deleteQuestion($idquestion){
	$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
	if(! $con )
	{
	die('Could not connect: ' . mysql_error());
	}
	//Delete all answer first
	$sqlans = "DELETE FROM answer where idquestion='$idquestion' ";

	if(! mysql_query( $sqlans, $con) )
	{
		die('Could not delete data: ' . mysql_error());
	}

	$sql = "DELETE FROM question where id='$idquestion' ";
	mysql_select_db('tucilwbd');

	if(! mysql_query( $sql, $con) )
	{
		die('Could not delete data: ' . mysql_error());
	}
	else
	{
		header("Location:index.php");
	}
}
if(isset($_GET['id'])) { deleteQuestion($_GET['id']); }

?>