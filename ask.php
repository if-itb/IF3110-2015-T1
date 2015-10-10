<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Ask a Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <?php
    	ini_set('short_open_tag', 'on');

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

			$conn->close();
		?>

	</head>
	<body>
		<div class="container">
			<a href="home.php"><h1>Simple StackExchange</h1></a>
			<div class="content">
				<h2>What's your question?</h2>
			</div>
			
			<div class="content">
				<form method="post" action="question.php">
					<input type="text" class="input-group" placeholder="Name" name="name">
					<input type="text" class="input-group" placeholder="Email" name="email">
					<input type="text" class="input-group" placeholder="Question Topic" name="topic">
					<textarea placeholder="Content" rows="5" name="content" resize="none"></textarea>
					<div class="button-bottom">
						<button type="submit" name="savequestion">Post</button>
					</div>
				</form>

			</div>
		</div>
	</body>
</html>