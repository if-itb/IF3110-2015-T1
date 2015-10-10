<!DOCTYPE HTML>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<title>Simple StackExchange</title>
<script type = "text/javascript">
function validateForm() {
    var valname = document.forms["askForm"]["name"].value;
	var valemail = document.forms["askForm"]["email"].value;
	var valtopic = document.forms["askForm"]["topic"].value;
	var valquestion = document.forms["askForm"]["question"].value;
	var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if ((valname == null || valname == "") || (valemail == null || valemail == "") || (valtopic == null || valtopic == "") || (valquestion == null || valquestion == "")) {
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

$name = '';
$question = '';
$topic = '';
$email = '';
$datetime = '';
$id = 0;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM questions WHERE QuestionID = $id";
		if (!$result = $db -> query($query)) {
			die ('Error query [' . $db->error . ']');
		}

		while ($row = $result->fetch_assoc()) {
			$topic = $row['Topic'];
			$question = $row['Question'];
			$name = $row['Name'];
			$email = $row['Email'];
			$datetime = $row['Datetime'];
		}
	}
}
?>
</head>
<body>
<div class = "maindiv">
<h1>Simple StackExchange</h1>
<br>
<h2 class = "left">What's your question?</h2>
<hr>
<br>
<?php
echo '<form action = "index.php" method = "post" onsubmit = "return validateForm()" name = "askForm">';
echo '<input type = "text" placeholder = " Name" name = "name" style = "width : 100%" value = "' . $name . '"><br><br>';
echo '<input type = "text" placeholder = " Email" name = "email" style = "width : 100%" value = "' . $email . '"><br><br>';
echo '<input type = "text" placeholder = " Topic" name = "topic" style = "width : 100%" value = "' . $topic . '"><br><br>';
echo '<textarea rows = "4" style = "width : 100%;" placeholder = " Content" name = "question">' . $question . '</textarea><br><br>';
echo '<input type = "hidden" name = "askid" value = "' . $id . '">';
echo '<div class = "right"><input type = "submit" style = "background-color : silver !important; width : 10%;" value = "Post"></div>';
echo '</form>';

$db->close();
?>
</div>
</body>
</html>
