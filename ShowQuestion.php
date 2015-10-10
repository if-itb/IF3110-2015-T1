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
				$vote = 0;
				$answers = 0;
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
				$vote = $row["vote"];
				$answers = $row["answers"];
			}

			// Close connection
			mysqli_close($conn);
		?>

		<div class="container">
			<h1>Simple StackExchange</h1><br>
			<h2><?php echo $topic ?></h2><br>
			<table>
				<tr>
					<td style="width:15%; text-align:center">
						<img src="up.png" style="width:20px;height:20px;"><br>
				    	<p style="font-size:40px; margin:0; color:lightgrey"> <?php echo $vote ?> </p>
						<img src="down.png" style="width:20px;height:20px;">
				    </td>
				    <td style="vertical-align:top">
				    	<?php echo $content ?><br>
				    </td>
				</tr>
			</table>
			<p style="text-align:right">asked by <?php echo $name ?> at <?php echo 'tanggal' ?>|edit|delete</p>
			<h2><?php echo $answers ?> Answer</h2><br>
			<p style="font-size:30px; margin:0; color:grey"> Your Answer </p>
			<form method="POST">
				<input type="text" name="name" id="inputtext1" placeholder="Name"><br>
				<input type="text" name="email" id="inputtext1" placeholder="Email"><br>
				<textarea name="content" id="content" placeholder="Content"></textarea><br><br>
				<input type="submit" value="Post">
			</form>
		</div>
		
	</body>
</html>