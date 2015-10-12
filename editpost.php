<?php
require_once('connection.php');
$query = "SELECT * FROM question WHERE id=".$_GET['id'].";";
$rs = pg_query(Database::getInstance(), $query) or die("Cannot execute query: $query\n"); 
$rows = pg_fetch_all($rs);
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Post</title>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<a class="homelink" href="http://mystackexchange.dev"><h1 id="title">My StackExchange</h1></a>
		<div class="content">
			<h2>Edit Post</h2>
			<hr>
			<form action="edit.php?id='.$_GET['id'].'", method="post">
			<input class="textbox" type="text", name="name", id="name" value="'.$rows[0]['name'].'">
			<br>
			<input class="textbox" type="text", name="email", id="email" value="'.$rows[0]['email'].'">
			<br>
			<input class="textbox" type="text", name="topic", id="topic" value="'.$rows[0]['topic'].'">
			<br>
			<textarea class="textarea", name="content", id="content">'.$rows[0]['content'].'</textarea>
			<br>
			<input type="submit" id="post" value="Post">
			</form>
		</div>	
	</div>
</body>
</html>';