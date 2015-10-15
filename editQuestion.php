<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 
$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
$qid = $_POST['qID'];
function editQuestion($qid) { 
	$name = $_POST['name']; 
	$email = $_POST['email']; 
	$topic = $_POST['topic']; 
	$content = $_POST['content'];
	$timestamp = date('Y-m-d H:i:s');
	//Insert data to question table
	$query = "UPDATE question SET name='$name',email='$email',topic='$topic',content='$content',timeask='$timestamp' WHERE id='$qid'";
	//Insert data into question table

	$data = mysql_query ($query)or die(mysql_error()); 
	if($data)
	{
	 echo "<script type='text/javascript'>alert('We have noted your question. Thank you and hope you get your answer') 
		window.location.href='index.php';</script>";
	} 
} 

function CheckSubmission($qid) { 
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['topic']) && !empty($_POST['content']) ) 
	//checking the name,email, topic and content which cannot be empty
	{ 
		editQuestion($qid); 
	} else {
		echo "<script type='text/javascript'>alert('Sorry...There are empty fields... please check that you have filled all the form') 
		window.location.href='showDataBase.php';</script>";
	} 
} 

if(isset($_POST['submit'])) { CheckSubmission($qid); }

?>