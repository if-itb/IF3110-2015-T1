<?php
	require_once("./Database.php");
	include("./Header.php");
?>

<head>

<link rel="stylesheet" href="style.css">

<script>	
function validateForm() {
    var editName = document.forms["Edit"]["Name"].value;
	var editEmail = document.forms["Edit"]["Email"].value;
	var editTopic = document.forms["Edit"]["Topic"].value;
	var editContent = document.forms["Edit"]["Content"].value;
	
    if (editName == null || editName == "") {
        alert("Name must be filled out");
        return false;
    }
	if (editEmail == null || editEmail == "") {
        alert("Email must be filled out");
        return false;
    }
	else {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (re.test(editEmail) == false){
			alert("Email is not valid");
			return false;
		}
	}
	if (editTopic == null || editTopic == "") {
        alert("Question Topic must be filled out");
        return false;
    }
	if (editContent == null || editContent == "") {
        alert("Content must be filled out");
        return false;
    }
	
	editQuestion();
	
}
</script>

<p id = "Edit"></p>
<script>
function editQuestion(){
	var xhttp = new XMLHttpRequest();
	
	var id = document.getElementById("ID").value;
	var name = document.getElementById("Name").value;
	var email = document.getElementById("Email").value;
	var topic = document.getElementById("Topic").value;
	var content = document.getElementById("Content").value;
	
	var editPost = "name=" + name + "&email=" + email + "&topic=" + topic + "&content=" + content + "&id=" + id;
	
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("Edit").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "/AJAX/Ask_edit.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(editPost);
}

</script>	
</head>

<body>

<?php
	$question = getQuestionByID($_GET['id']);
?>

<!-- Question -->
<div class = "center">
	<div class = "left">
		<p2> What's your question? </p2>
	</div>
	
	<table>
		<tr>
			<td>
				<form action = "Home.php" method = "post" name = "Edit">
					<input type= "text" name= "Name" value = "<?= $question["q_name"]?>" size = "64" id = "Name"/><br/>	
					<input type= "text" name= "Email" value = "<?= $question["q_email"]?>" size = "64" id = "Email"/><br/>
					<input type= "text" name= "Topic" value = "<?= $question["q_topic"]?>" size = "64" id = "Topic"/><br/>
					<textarea name = "Content" rows="4" cols="65" id = "Content"><?= $question["q_content"]?> </textarea><br/>
					<input type = "hidden" name = "ID" value = "<?= $question["q_id"]?>" id = "ID"/> 
					
					<div class = "right"><input type = "button" onclick = "validateForm()" value = "Edit" /> </div>
				</form>
			</td>	
		</tr>
	</table>

</div>



<?php

	include("./Footer.php");
?>