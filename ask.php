<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Ask a Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <?php
			$servername = "localhost";
			$username = "root";
			$password = "12345";
			$db = "stackexchange";

			// Create connection
			$conn = new mysqli($servername, $username, $password,$db);
			// Check connection
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			} 
			echo "Connected successfully";

			if (isset($_POST['savequestion'])) { 
				$name = $_POST['name'];
				$email = $_POST['email'];
				$topic = $_POST['topic'];
				$content = $_POST['content'];

				$sql = "INSERT INTO question (name, email, topic, content,vote)
				VALUES ('$name', '$email', '$topic', '$content', 0)";

				if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
				} else {
				   echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} 
		?>

	</head>
	<body>
		<div class="container">
			<h1>Simple StackExchange</h1>
			<div class="content">
				<h2>What's your question?</h2>
			</div>
			
			<div class="content">
				<form method="post">
					<input type="text" class="input-group" placeholder="Name" name="name">
					<input type="text" class="input-group" placeholder="Email" name="email">
					<input type="text" class="input-group" placeholder="Question Topic" name="topic">
					<textarea placeholder="Content" rows="5" name="content"></textarea>
					<div class="button-bottom">
						<button type="submit" name="savequestion">Post</button>
					</div>
				</form>

			</div>
		</div>
	</body>
</html>