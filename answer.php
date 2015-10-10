<!DOCTYPE HTML>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<title>Simple StackExchange</title>
<?php
$db = new mysqli('localhost', 'root', '', 'stackexchange');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$id = $_GET['id'];
	$query = "SELECT * FROM questions WHERE QuestionID = $id";
	if (!$result = $db -> query($query)) {
		die ('Error query [' . $db->error . ']');
	}

	while ($row = $result->fetch_assoc()) {
		$votes = $row['Votes'];
		$topic = $row['Topic'];
		$question = $row['Question'];
		$name = $row['Name'];
		$datetime = $row['Datetime'];
		$answers = $row['Answers'];
	}
}
?>
</head>
<body>
<div class = "maindiv">
<h1>Simple StackExchange</h1>
<br>
<?php
echo '<h2 class = "left">' . $topic . '</h2>';
echo '<hr>';
echo '<table>';
echo '<div class = "votes">';
echo '<h2>' . $votes . '</h2>';
echo '</div>';
echo '<div class = "content">';
echo $question;
echo '</div>';
echo '</div>';
echo '<div class = "right">asked by ' . $name . ' at ' . $datetime . ' | <a href = "ask.php" class = "yellow">edit</a> | <a class = "delete">delete</a></div>';
echo '<h2 class = "left"> ' . $answers . ' Answer</h2><br>';
?>
<table>
<?php

$db->close();
?>
</table>
<h2 class = "left">Your Answer</h2><br>
<form action = "answer.php" method = "post">
<input type = "text" name = "name" placeholder = " Name" style = "width : 100%"><br><br>
<input type = "text" name = "email" placeholder = " Email" style = "width : 100%"><br><br>
<textarea rows = "4" style = "width : 100%;" name = "answer" placeholder = " Content"></textarea><br><br>
<div style = "text-align : right; width : 100%;"><input type = "submit" style = "background-color : silver !important; width : 10%;" value = "Post"></div>
</form>
</div>
</body>
</html>
