<!DOCTYPE html>
<html>
	<head>
		<title>Stack Exchange</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
		<script src="Functions.js"></script>
	</head>
	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "dininta";
			$dbname = "stackexchange";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			// Get data from database
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$id = $_GET["id"];
				$sql = "SELECT * FROM question WHERE questionID='$id'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$name = $row["name"];
				$email = $row["email"];
				$topic = $row["question_topic"];
				$content = $row["content"];
			}
		?>
		<div class="container">
			<h1>Simple StackExchange</h1><br>
			<h2>What's your question? </h2><br>
			<form name="QuestionForm" action="UpdateQuestion.php" onsubmit="return validateQuestionForm()" method="POST">
				<input type="hidden" name="questionID" value="<?php echo $id; ?>" />
				<input type="text" name="name" id="inputtext1" value="<?php echo $name; ?>"><br>
				<input type="text" name="email" id="inputtext1" value="<?php echo $email; ?>"><br>
				<input type="text" name="topic" id="inputtext1" value="<?php echo $topic; ?>"><br>
				<textarea name="content" id="content" value=><?php echo $content; ?> </textarea><br><br>
				<input type="submit" value="Post">
			</form>
		</div>		
	</body>
</html>