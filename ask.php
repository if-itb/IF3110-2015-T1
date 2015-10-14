<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>		
		<a href="index.php"><H1>SIMPLE STACK EXCHANGE</H1></a>	
		
		<?php
		if ($_GET['mode']==1) {
			echo "<input type='hidden' name='qid' value='".$_POST["qid"]."'>";
			echo "
			<H4>WHAT'S YOUR QUESTION?</H4><br>
			<hr width=80%><br>
			<form name=\"qForm\" action='asked.php' method=\"post\" onsubmit=\"return validateForm()\">
			<textarea id='name' name='name' onfocus=\"if (this.value == 'Name') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Name';}\">".$_POST['name']."</textarea><br>
			<br><textarea id='mail' name='mail' onfocus=\"if (this.value == 'Email') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Email';}\">".$_POST['mail']."</textarea><br>
			<br><textarea id='topic' name='topic' onfocus=\"if (this.value == 'Question Topic') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Question Topic';}\">".$_POST['topic']."</textarea><br>
			<input type=\"hidden\" name='mode' value= ".$_GET['mode'].">
			<input type='hidden' name='qid' value='".$_POST["qid"]."'>
			<br><textarea id='content' name='qcontent' onfocus=\"if (this.value == 'Content') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Content';}\">".$_POST['qcontent']."</textarea><br>	
			<br><div class='post'><input id='post' type=\"submit\" value=\"Post\"></div>
			</form> 			
			";				
		} else {
			echo "
			<H4>WHAT'S YOUR QUESTION?</H4><br>
			<hr width=80%><br>
			<form name=\"qForm\" action='asked.php' method=\"post\" onsubmit=\"return validateForm()\">
			<textarea id='name' name='name' onfocus=\"if (this.value == 'Name') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Name';}\">Name</textarea><br>
			<br><textarea id='mail' name='mail' onfocus=\"if (this.value == 'Email') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Email';}\">Email</textarea><br>
			<br><textarea id='topic' name='topic' onfocus=\"if (this.value == 'Question Topic') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Question Topic';}\">Question Topic</textarea><br>
			<input type=\"hidden\" name='mode' value=".$_GET['mode'].">
			<br><textarea id='content' name='qcontent' onfocus=\"if (this.value == 'Content') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Content';}\">Content</textarea><br>	
			<br><div class='post'><input id='post' type=\"submit\" value=\"Post\"></div>
			</form> 			
			";		
		}
		
		?>
		

	<script>
		function validateForm() {
			
			var name = document.getElementById("name").value;
			var mail = document.getElementById("mail").value;
			var topic = document.getElementById("topic").value;
			var cont = document.getElementById("content").value;
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			
	
			if (name == null || name == "" || name == "Name") {
				alert("Name must be filled out");
				return false;
			}
			if (mail == null || mail == "" || mail == "Email") {
				alert("Email must be filled out");
				return false;
			}
			if (!validateEmail(mail)) {
				alert("Incorrect email address");
				return false;
			}
			if (topic == null || topic == "" || topic == "Question Topic") {
				alert("Topic must be filled out");
				return false;
			}
			if (cont == null || cont == "" || cont == "Content") {
				alert("Content must be filled out");
				return false;
			}
			
			    
		}
		
		function validateEmail(email) {
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			return re.test(email);
		}
		function validate() {
			if (!validateForm()) {
				returnToPreviousPage();	
			}
		}

	</script>
	</body>
</html>
