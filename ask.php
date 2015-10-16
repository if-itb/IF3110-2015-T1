<!DOCTYPE html>
<html>
	<head>
		<title> Ask </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<?php
			$name = "";
			$email = "";
			$topic = "";
			$content = "";
			
			if(!empty($_POST["id"])){
				$id = $_POST["id"];
				$dbHost = 'localhost:3306';
				$dbUser = 'root';
				$dbPass = '';
				$dbName = 'question_answers';
				
				$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
				
				if(!$conn){
					die('Could not connect: ' . mysql_error());
				}
				
				$sql = "SELECT * FROM `questions` WHERE ID = " . $id;
				$result = mysqli_query($conn, $sql);
				if ($row = $result->fetch_assoc()) {
					$name = $row["Name"];
					$email = $row["Email"];
					$topic = $row["Topic"];
					$content = $row["Content"];
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$input = 'edit';
				
			}
		?>
		
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
					window.alert(text);
					return false;
				}
			}
		</script>
		
		<form name="ask" action="createQuestion.php" method="post" onsubmit="return validateInput()">
			<div class="left">
				<input name="id" type="hidden" value="<?php echo $id; ?>">
				<input name="name" class="textBox" type="text" placeholder="Name" value="<?php echo $name; ?>">
				<br><br>
				<input name="email" class="textBox" type="text" placeholder="Email" value="<?php echo $email; ?>">
				<br><br>
				<input name="topic" class="textBox" type="text" placeholder="Question Topic" value="<?php echo $topic; ?>">
				<br><br>
				<textarea name="content" placeholder="Content"><?php echo $content; ?></textarea>
				<br><br>
				<input name="input" type="hidden" value="<?php echo $input ?>">
			</div>
			<div class="right">
				<input type="submit" class="postButton" value="Post">
			</div>
		</form>
		
		
	</body>
</html>

