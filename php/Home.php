<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
		<script src = "../js/functions.js"></script>
	</head>
	<body>
		<div class = "middle-box">
			<a href = "Home.php" class = "hl-black"><h1>Simple StackExchange</h1></a>
			<br />
			<br />
			<form class = "middle" method = "post">
				<input id = "boxed" type = "text" name = "search">
				<input type = "submit" name = "post" value = "Search">
			</form>
			<p class = "middle">Cannot find what you are looking for? <a class = "hl-orange" href = "Question.php?edit=-1">Ask here</a></p>
			<br />
			<br />
			<h3>Recently Asked Questions</h2>
		</div>
		<?php

			if(isset($_POST['post'])) {
				$search = $_POST['search'];

				header('Location: search.php?search='.$search);
			}

			require 'functions.php';

			printQList(0);
			
		?>
	</body>
</html>	