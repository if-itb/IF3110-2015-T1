<script type="text/javascript">
function validateAnswerForm() {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if((document.forms["Answer"]["AnswerName"].value == null) || (document.forms["Answer"]["AnswerName"].value == ""))
	{
		alert("Invalid Name");
		return false;
	}
	if((document.forms["Answer"]["AnswerEmail"].value == null) || (document.forms["Answer"]["AnswerEmail"].value == ""))
	{
		alert("Invalid Email");
		return false;
	}
	if((document.forms["Answer"]["AnswerContent"].value == null) || (document.forms["Answer"]["AnswerContent"].value == ""))
	{
		alert("Invalid Content");
		return false;
	}
	
	else if(!re.test(document.forms["Answer"]["AnswerEmail"].value)){
		   alert("Incorrect email address");
		   return false;
		}
}

</script>
<script>
function upvote(int) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("ajaxq").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "upquestion.php?id="+int, true);
  xhttp.send();
}
</script>
<script>
function downvote(int) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("ajaxq").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "downquestion.php?id="+int, true);
  xhttp.send();
}
</script>
<script>
function upvoteans(int) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("ajaxa"+int).innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "upanswer.php?id="+int, true);
  xhttp.send();
}
</script>
<script>
function downvoteans(int) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("ajaxa"+int).innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "downanswer.php?id="+int, true);
  xhttp.send();
}
</script>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="wbd.css">
	<title>13513018_Steven Andianto</title>
</head>
<body>
	<h1><a href="wbd.php">Simple StackExchange</a></h1>
	<div class="content">
	<br>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id'])) {
				$id = $_GET['id'];
				$conn ->query("SELECT * FROM question WHERE id = $id");

			}
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$conn ->query ("INSERT INTO answer (question_id, name, email, content, date, vote) VALUES ('$_GET[id]','$_POST[AnswerName]', '$_POST[AnswerEmail]', '$_POST[AnswerContent]',NOW(),0)");
		$conn ->query("SELECT * FROM answer WHERE question_id = $_GET[id]");
		$conn ->query ("UPDATE question SET answers = answers + 1 WHERE id = $_GET[id]");
		}
		$q = "SELECT * from question";
		if (!$result = $conn -> query($q)){
				die('Error Query['.$conn -> error.']');
		}
		//QUESTION
	while($row = $result -> fetch_assoc()){
	if($_GET['id'] == $row['id']){
	echo '<p id="judul">'.$row['topic'].'</p>';
	echo '<hr>';
	echo '<table style="table-layout: fixed; width:100%;">';
	echo	'<tr>';
	echo	'<td id="td4"><img src="up.png" width="42" height="42" onclick="upvote('.$_GET['id'].');"><div id="ajaxq">'.$row['vote'].'</div><img src="down.png" width="42" height="42" onclick="downvote('.$_GET['id'].');"></td>';
	echo	'<td id="td5"><div style="word-wrap:break-word">'.$row['content'].'</div></td>';
	echo	'</tr>';
	echo	'<tr>';
	echo	'<td id="td6" colspan ="2">asked by <blue>'.$row['nama'].'</blue> at '.$row['date'].' | <a href="wbd2.php?id='.$row['id'].'"><yellow>edit</yellow></a> | <a href="wbd.php?id='.$row['id'].'"><red>delete</red></a></td>';
	echo	'</tr>';
	echo '</table>';
	$Answers = $row['answers'];
	}
	}
	?>
	<?php
		//ANSWER
	?>
	</div>
	<div class="content">
	<br>
	<?php
	echo '<p id="judul">'.$Answers.' Answer</p>';
	?>
	<?php
		$q = "SELECT * from answer WHERE question_id = $_GET[id]";
		if (!$result = $conn -> query($q)){
				die('Error Query['.$conn -> error.']');
		}
		echo '<hr>';
		while($row = $result -> fetch_assoc()){
			if($row['question_id']==$_GET['id']){
			echo '<table style="table-layout: fixed; width: 100%">';
			echo	'<tr>';
			echo	'<td id="td4"><img src="up.png" width="42" height="42" onclick="upvoteans('.$row['id'].');"><br><div id="ajaxa'.$row['id'].'">'.$row['vote'].'</div><img src="down.png" width="42" height="42" onclick="downvoteans('.$row['id'].');"></td>';
			echo	'<td id="td5"><div style="word-wrap:break-word">'.$row['content'].'</div></td>';
			echo	'</tr>';
			echo	'<tr>';
			echo	'<td id="td6" colspan ="2"><div style="word-wrap:break-word"> answered by <blue>'.$row['name'].'</blue> at '.$row['date'].'</div></td>';
			echo	'</tr>';
			echo '</table>';
			echo '<hr>';
			}
		}
	mysqli_close($conn);
	?>
	</div>
	<p id="judulbesar">Your Answer</p>
	<?php
	echo '<form name:"Answer" action="wbd3.php?id='.$_GET['id'].'" method="post" onsubmit="return validateAnswerForm()">';
	?>
	<input type="text" id="textbox" name="AnswerName" placeholder=" Name" >
	<input type="text" id="textbox" name="AnswerEmail" placeholder=" Email">
	<textarea id="textarea" name="AnswerContent" placeholder=" Content"></textarea>		
	<input type="submit" id="post" name="Post" value="Post">
	</form>
	
</body>
