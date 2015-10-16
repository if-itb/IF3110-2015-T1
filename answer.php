<!DOCTYPE HTML>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<title>Simple StackExchange</title>
<script type = "text/javascript">
function vote(up, id, type) {
	var xhttp;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
		} else {
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if (type == 'question')
				document.getElementById("votequestion").innerHTML = xhttp.responseText;
			else
				document.getElementById("voteanswer"+id).innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET", "vote.php?id="+id+"&type="+type+"&up="+up, true);
	xhttp.send();
}
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
	$nameans = mysqli_real_escape_string($db, $_POST['name']);
	$emailans = mysqli_real_escape_string($db, $_POST['email']);
	$answer = mysqli_real_escape_string($db, $_POST['answer']);
	$db->query("INSERT INTO answers (QuestionID, Votes, Answer, Name, Email, Datetime) VALUES ($id, 0, '$answer', '$nameans', '$emailans', NOW())");
	$db->query("UPDATE questions SET Answers = Answers + 1 WHERE QuestionID = $id");
	$answers = $answers + 1;
}
?>
</head>
<body>
<div class = "maindiv">
<h1><a href="index.php" id = "title">Simple StackExchange</a></h1>
<br>
<?php
echo '<h2 class = "left">' . $topic . '</h2>';
echo '<table>';
echo '<tr>';
echo '<td class = "votes"><img src = "up.png" class = "vote" onclick = "vote(1, ' . $id . ', \'question\')"><h2 id="votequestion">' . $votes . '</h2><img src = "down.png" class = "vote" onclick = "vote(0, ' . $id . ', \'question\')"></td>';
echo '<td class = "content">';
echo $question;
echo '</td>';
echo '</tr></table>';
echo '<div class = "right">asked by <a class = "blue">' . $name . '</a> at <a class = "blue">' . $datetime . '</a> | <a href = "ask.php?id=' . $id . '" class = "yellow">edit</a> | <a class = "red" href = "index.php?id=' . $id . '">delete</a></div>';
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
		echo '<td class = "votes"><img src = "up.png" class = "vote" onclick = "vote(1, ' . $row['AnswerID'] . ', \'answer\')"><h2 id = "voteanswer' . $row['AnswerID'] . '">' . $row['Votes'] . '</h2><img src = "down.png" class = "vote" onclick = "vote(0, ' . $row['AnswerID'] . ', \'answer\')"></td>';
		echo '<td class = "content">' . $row['Answer'] . '<br>';
		echo '<div class = "right">answered by ' . $row['Name'] . ' at ' . $row['Datetime'] . '</div></td></tr>';
	}
echo '<tr></tr>';

?>
</table><br>
<h2 class = "left">Your Answer</h2><br><?php
echo '<form action = "answer.php?id=' . $id . '" name = "ansForm" method = "post" onsubmit = "return validateForm()">';
echo '<input type = "text" name = "name" placeholder = " Name" style = "width : 100%"><br><br>';
echo '<input type = "text" name = "email" placeholder = " Email" style = "width : 100%"><br><br>';
echo '<textarea rows = "4" style = "width : 100%;" name = "answer" placeholder = " Content"></textarea><br><br>';
echo '<div style = "text-align : right; width : 100%;"><input type = "submit" style = "background-color : silver !important; width : 10%;" value = "Post"></div>';
echo '</form>';
$db->close();
?>
</div>
</body>
</html>
