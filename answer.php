<!DOCTYPE HTML>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<title>Simple StackExchange</title>
<script type = "text/javascript">
function validateForm() {
    var valname = document.forms["ansForm"]["name"].value;
	var valemail = document.forms["ansForm"]["email"].value;
	var valanswer = document.forms["ansForm"]["answer"].value;
	var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if ((valname == null || valname == "") || (valemail == null || valemail == "") || (valanswer == null || valanswer == "")) {
        alert("All fields must be filled out.");
        return false;
    }
	else if (!re.test(valemail)) {
		alert("Incorrect email address format.");
        return false;
	}
}
</script>
<?php
$db = new mysqli('localhost', 'root', '', 'stackexchange');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

if (isset($_GET['id'])) {
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$db->query("INSERT INTO answers (QuestionID, Votes, Answer, Name, Email, Datetime) VALUES ($id, 0, '$_POST[answer]', '$_POST[name]', '$_POST[email]', NOW())");
	$db->query("UPDATE questions SET Answers = Answers + 1 WHERE QuestionID = $id");
	$answers = $answers + 1;
}
?>
</head>
<body>
<div class = "maindiv">
<h1>Simple StackExchange</h1>
<br>
<?php
echo '<h2 class = "left">' . $topic . '</h2>';
echo '<table>';
echo '<tr>';
echo '<td class = "votes"><h2>' . $votes . '</h2></td>';
echo '<td class = "content">';
echo $question;
echo '</td>';
echo '</tr></table>';
echo '<div class = "right">asked by ' . $name . ' at ' . $datetime . ' | <a href = "ask.php" class = "yellow">edit</a> | <a class = "red" href = "index.php?id=' . $id . '">delete</a></div>';
echo '<h2 class = "left"> ' . $answers . ' Answer</h2><br>';
?>
<table>
<?php
$query = "SELECT * FROM answers WHERE QuestionID = $id";
	if (!$result = $db -> query($query)) {
		die ('Error query [' . $db->error . ']');
	}

	while ($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo '<td class = "votes"><h2>' . $row['Votes'] . '</h2></td>';
		echo '<td class = "content">' . $row['Answer'] . '<br>';
		echo '<div class = "right">asked by ' . $row['Name'] . ' at ' . $row['Datetime'] . '</div></td></tr>';
	}
echo '<tr></tr>';
$db->close();
?>
</table><br>
<h2 class = "left">Your Answer</h2><br><?php
echo '<form action = "answer.php?id=' . $id . '" name = "ansForm" method = "post">';
echo '<input type = "text" name = "name" placeholder = " Name" style = "width : 100%"><br><br>';
echo '<input type = "text" name = "email" placeholder = " Email" style = "width : 100%"><br><br>';
echo '<textarea rows = "4" style = "width : 100%;" name = "answer" placeholder = " Content"></textarea><br><br>';
echo '<div style = "text-align : right; width : 100%;"><input type = "submit" style = "background-color : silver !important; width : 10%;" value = "Post"></div>';
echo '</form>';
?>
</div>
</body>
</html>
