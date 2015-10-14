<!DOCTYPE html>
<html>
	<head>
		<title> Ask </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		
		<h2>What's your question?</h3>
		<br>
		
		<script>
			function validateInput() {
				var name, email, topic, content, text;
				var error = false;
				var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

				text = "";
				
				name = document.forms["ask"]["name"].value;
				email = document.forms["ask"]["email"].value;
				topic = document.forms["ask"]["topic"].value;
				content = document.forms["ask"]["content"].value;
				
				//name
				if(name == null || name == ""){
					text = text + "Name must be filled" + "\n";
					error = true;
				}
				
				
				//email
				if(email == null || email == ""){
					text = text + "Email must be filled" + "\n";
					error = true;
				} else if (!re.test(email)) {
					text = text + "Please enter a valid email address" + "\n";
					error = true;
				}
				
				//topic
				if(topic == null || topic == ""){
					text = text + "Topic must be filled" + "\n";
					error = true;
				}
				
				//Content
				if(content == null || content == ""){
					text = text + "Content must be filled" + "\n";
					error = true;
				}
				
				
				if(error){
					document.getElementById("error").value = text;
					window.alert(text);
					return false;
				}
			}
		</script>
		
		<form name="ask" action="createQuestion.php" method="post" onsubmit="return validateInput()">
			<div class="left">
				<input name="name" class="textBox" type="text" placeholder="Name">
				<br><br>
				<input name="email" class="textBox" type="text" placeholder="Email">
				<br><br>
				<input name="topic" class="textBox" type="text" placeholder="Question Topic">
				<br><br>
				<textarea name="content" placeholder="Content"></textarea>
				<br><br>
			</div>
			<div class="right">
				<input type="submit" class="postButton" value="Post">
			</div>
		</form>
		
		<p id="error"></p>
		
		
	</body>
</html>

