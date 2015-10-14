<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
	</head>
	<body>
		<div class = "middle-box">
			<h1>Simple StackExchange</h1>
			<br />
			<br />
			<form class = "middle" method = "post">
				<input id = "boxed" type = "text" name = "search">
				<input type = "submit" name = "search" value = "Search">
			</form>
			<p class = "middle">Cannot find what you are looking for? <a class = "hl-orange" href = "Question.html">Ask here</a></p>
			<br />
			<br />
			<h3>Recently Asked Questions</h2>
			<div class = "question">
				<div class = "small-box">
					<p>0
					<br />
					Votes</p>
				</div>
				<div class = "small-box">
					<p>0
					<br />
					Answers</p>
				</div>
				<div class = "big-box">
					<p class = "top-left">The question topic goes here</p>
				</div>
				<div>
					<p class = "right">Asked by | <span class = "hl-blue">name</span> | <span class = "hl-orange" href = "Question.html">edit</span> | <span class = "hl-red">delete</span></p>
				</div>
			</div>
		</div>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";

			// Create connection
			$conn = new mysqli($servername, $username, $password);

			// Check connection
			if (mysqli_connect_error()) {
			    die("Database connection failed: " . mysqli_connect_error());
			}
			echo "Connected successfully";
		?>
	</body>
</html>