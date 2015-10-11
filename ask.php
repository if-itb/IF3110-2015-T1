<?php
	include "views/header.php";
	require_once "views/home.view.php";
?>

	<div class="container">
		<h2>What's your question?</h2>
		<hr>
		<div class="center">
			<form class="basic-grey" action="controllers/ask.controller.php" method="post">
				<input type="text" id="name" name="name" placeholder="Name" required><br>
				<input type="text" id="email" name="email" placeholder="Email" required><br>
				<input type="text" id="topic" name="topic" placeholder="Question Topic" required><br>
				<textarea id="content" name="content" placeholder="Content" required></textarea><br>
				<input type="submit" value="Post">
			</form>
		</div>
	</div>
</body>
</html>