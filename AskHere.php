<!DOCTYPE html>
<html>
<head>
	<title>AskHere</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php  
		
		if(isset($_GET['id'])){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "stackexchange";
			$id=$_GET["id"]; 
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT ID_Question, Topic, Content, Email, Author FROM question WHERE ID_Question = '$_GET[id]' ORDER BY Date DESC";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$name	= $row["Author"];
			$email 	= $row["Email"];
			$topic	= $row["Topic"];
			$text	= $row["Content"];
		}else{
			$id="-99"; 
			$name	= "";
			$email 	= "";
			$topic	= "";
			$text	= "";
		}
	?>
	
	<div class="container">
		<h1>Simple StackExchange</h1>
		<h2>What's your question?</h2>
		<hr>
		<div class="questionform">
			<form action="add_question.php" method="post">
				<input type="text" name="Name" placeholder="Name" value="<?php echo $name; ?>">
				<input type="text" name="Email" placeholder="Email" value="<?php echo $email?>">
				<input type="text" name="QuestionTopic" placeholder="Question Topic" value="<?php echo $topic?>">
				<textarea placeholder= "Content" name="message"><?php echo $text?></textarea>
				<input type="hidden" name="id"  value="<?php echo $id?>">
				<input class="button" type="submit" name="Post" value="Post">
			</form>
		</div>
	</div>	
</body>
</html>