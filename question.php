<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

     <?php
			$servername = "localhost";
			$username = "root";
			$password = "12345";

			// Create connection
			$conn = new mysqli($servername, $username, $password);
			// Check connection
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			} 
			echo "Connected successfully";
		?>
		
	</head>
	<body>
		<div class="container">
			<h1>Simple StackExchange</h1>
			<div class="content">
				<h2>Question Topic</h2>
			</div>
			
			<div class="content">
				<h2>Answer</h2>
			</div>

			<div class="content">
				<div class="grey-title">Your Answer</div>
				<form>
					<input type="text" class="input-group" placeholder="Name">
					<input type="text" class="input-group" placeholder="Email">
					<input type="text" class="input-group" placeholder="Question Topic">
					<textarea placeholder="Content" rows="5"></textarea>
				<div class="button-bottom">
					<button type="submit">Post</button>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>