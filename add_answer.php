<?php
function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
if(isset($_POST['Post'])){
	

	include('DB_connection.php');
	//$ID_Q		= $_POST['id_q'];
	$ID_Q		= $_POST['id-question'];
	$name		= $_POST['Name'];	
	$email		= $_POST['Email'];
	$date		= date('Y-m-d H:i:s');
	$content	= $_POST['message'];	
	$input = mysql_query("INSERT INTO answer(ID_Question, content, vote, author, date, email) VALUES('$ID_Q','$content' , '0','$name','$date' ,'$email')") or die(mysql_error());		
	Redirect('Answer.php? id=' . $_POST['id-question'], false);
}


?>