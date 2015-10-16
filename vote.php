<!DOCTYPE HTML>
<html>
<head>
<?php
$db = new mysqli('localhost', 'root', '', 'stackexchange');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
if (isset($_GET['id']) && isset($_GET['type']) && isset($_GET['up'])) {
	$id = $_GET['id'];
	if ($_GET['type'] == 'question')
		if ($_GET['up'] == 1)
			$db->query("UPDATE questions SET Votes = Votes + 1 WHERE QuestionID = $id");
		else
			$db->query("UPDATE questions SET Votes = Votes - 1 WHERE QuestionID = $id");
	else
		if ($_GET['up'] == 1)
			$db->query("UPDATE answers SET Votes = Votes + 1 WHERE AnswerID = $id");
		else
			$db->query("UPDATE answers SET Votes = Votes - 1 WHERE AnswerID = $id");
}
?>
</head>
<body>
<?php
if ($_GET['type'] == 'question')
	$query = "SELECT * FROM questions WHERE QuestionID = $id";
else
	$query = "SELECT * FROM answers WHERE AnswerID = $id";
if (!$result = $db -> query($query)) {
	die ('Error query [' . $db->error . ']');
}

while ($row = $result->fetch_assoc()) {
	echo $row['Votes'];
}
?>
</body>
</html>