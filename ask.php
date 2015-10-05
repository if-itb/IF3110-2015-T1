<?php
	include "views/header.php";
	require_once "views/home.view.php";
?>

	<h2>What's your question?</h2>
	<hr>
	<div class="center">
		<form action="ask_submit.php" method="post">
			<input type="text" id="name" name="name" placeholder="Name"><br>
			<input type="text" id="email" name="name" placeholder="Email"><br>
			<input type="text" id="topic" name="name" placeholder="Question Topic"><br>
			<input type="text" id="content" name="name" placeholder="Content"><br>
			<input type="submit" value="Post">
		</form>
	</div>
</body>
</html>