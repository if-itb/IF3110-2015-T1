<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
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

			// Add to database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $_POST["name"];
				$email = $_POST["email"];
				$topic = $_POST["topic"];
				$content = $_POST["content"];
				$sql = "INSERT INTO question (name, email, question_topic, content) VALUES ('$name', '$email', '$topic', '$content')";
				$conn->query($sql);
			}
			else if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$id = $_GET["id"];
				$sql = "SELECT * FROM question WHERE questionID=$id";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$name = $row["name"];
				$email = $row["email"];
				$topic = $row["question_topic"];
				$content = $row["content"];
			}

			// Close connection
			mysqli_close($conn);
		?>

		<div class="container">
			<h1>Simple StackExchange</h1><br>
			<h2><?php echo $topic ?></h2><br>
			<p>
				<?php echo $content ?>
			</p>
			<p> asked by <?php echo $name ?> at <?php echo 'tanggal' ?>|edit|delete</p>
		</div>
		
	</body>
</html>