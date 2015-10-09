<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="wbd.css">
	<title>13513018_Steven Andianto</title>
</head>
<body>
	<h1>Simple StackExchange</h1>
	<br>
	<h2>What's your question?</h2>
	<hr>
	<br>
	<div align="center">
	<form name:"Question" action="wbd.php" method="post">
	<input type="text" id="textbox" name="InputName" placeholder=" Name" >
	<input type="text" id="textbox" name="InputEmail" placeholder=" Email">
	<input type="text" id="textbox" name="InputQuestionTopic" placeholder=" Question Topic">
	<textarea id="textarea" name="InputContent" placeholder=" Content"></textarea>		
	<input type="submit" id="post" name="Post" value="Post">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	</form>
</body>
