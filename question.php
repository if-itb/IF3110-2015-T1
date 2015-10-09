<?php
	include "views/header.php";
	require_once "views/question.view.php";

	showQuestion($_GET["q_id"]);
?>

	<div class="center">
		<form action="controllers/answer.controller.php" method="post">
			<input type="text" id="name" name="name" placeholder="Name"><br>
			<input type="text" id="email" name="email" placeholder="Email"><br>
			<input type="text" id="content" name="content" placeholder="Content"><br>
			<input type="submit" value="post">
		</form>
	</div>
</body>
</html>