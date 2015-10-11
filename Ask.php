<?php
	include("./Header.php");
?>

<head>

<link rel="stylesheet" href="style.css">

<script>	
function validateForm() {
    var askName = document.forms["Ask"]["Name"].value;
	var askEmail = document.forms["Ask"]["Email"].value;
	var askTopic = document.forms["Ask"]["Topic"].value;
	var askContent = document.forms["Ask"]["Content"].value;
	
    if (askName == null || askName == "") {
        alert("Name must be filled out");
        return false;
    }
	if (askEmail == null || askEmail == "") {
        alert("Email must be filled out");
        return false;
    }
	if (askTopic == null || askTopic == "") {
        alert("Question Topic must be filled out");
        return false;
    }
	if (askContent == null || askContent == "") {
        alert("Content must be filled out");
        return false;
    }
	
	postQuestion();
	
}
</script>


<p id = "Ask"></p>
<script>
function postQuestion(){
	var xhttp = new XMLHttpRequest();
	
	var name = document.getElementById("Name").value;
	var email = document.getElementById("Email").value;
	var topic = document.getElementById("Topic").value;
	var content = document.getElementById("Content").value;
	
	var askPost = "name=" + name + "&email=" + email + "&topic=" + topic + "&content=" + content;
	
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("Ask").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "/AJAX/Ask_post.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(askPost);
}


</script>

</head>


<body>

<!-- Question -->
<div class = "center">
	<div class = "left">
		<p2> What's your question? </p2>
	</div>
	
	<table>
		<tr>
			<td>
				<form action = "Home.php" method = "post" name = "Ask">
					<input type= "text" name= "Name" size = "64" placeholder = "Name" id = "Name"/><br/>	
					<input type= "text" name= "Email" size = "64" placeholder = "Email" id = "Email"/><br/>
					<input type= "text" name= "Topic" size = "64" placeholder = "Question Topic" id = "Topic"/><br/>
					<textarea name = "Content" rows="4" cols="65" placeholder = "Content" id = "Content"></textarea><br/>
		
					<div class = "right"><input type = "button" onclick = "validateForm()" value = "Post" /> </div>
				</form>
			</td>	
		</tr>
	</table>

</div>



<?php

	include("./Footer.php");
?>