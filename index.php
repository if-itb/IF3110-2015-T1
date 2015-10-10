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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['askid'] != 0)
		$db->query("UPDATE questions SET Topic = '$_POST[topic]', Question = '$_POST[question]', Name = '$_POST[name]', Email = '$_POST[email]', Datetime = NOW() WHERE QuestionID = '$_POST[askid]'");
	else
		$db->query("INSERT INTO questions (Votes, Answers, Topic, Question, Name, Email, Datetime) VALUES (0, 0, '$_POST[topic]', '$_POST[question]', '$_POST[name]', '$_POST[email]', NOW())");
}
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$db->query("DELETE FROM questions WHERE QuestionID = $id");
	}
}
?>
</head>
<body>
<div class = "maindiv">
<h1>Simple StackExchange</h1>
<div class = "searchdiv"><input type = "text"> <input type = "submit" value = "Search"></div>
Cannot find what you are looking for? <a href = "ask.php" class = "yellow">Ask here</a><br><br>
<h2 class = "left">Recently Asked Questions</h2>
<table>
<?php
$query = "SELECT * FROM questions";
if (!$result = $db -> query($query)) {
	die ('Error query	 [' . $db->error . ']');
}
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo '<td class = "votes">' . $row['Votes'] . '<br>Votes</td>';
	echo '<td class = "answers">' . $row['Answers'] . '<br>Answers</td>';
	echo '<td class = "question"><a href = "answer.php?id=' . $row['QuestionID'] . '">' . $row['Topic'] . '</a><br>' . $row['Question'] . '</td>';
	echo '<td class = "asked">asked by <a class = "blue">' . $row['Name'] . '</a> at <a class = "blue">' . $row['Datetime'] . '</a> | <a href = "ask.php?id=' . $row['QuestionID'] . '" class = "yellow">edit</a> | <a class = "red" href = "index.php?id=' . $row['QuestionID'] . '">delete</a></td>';
	echo '<tr>';
}
$db->close();
?>
</table>
</div>
</body>
</html>
