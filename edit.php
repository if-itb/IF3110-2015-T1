<?php
	include "views/header.php";
	require_once "controllers/question.controller.php";

	$id = $_GET["q_id"];
	$questionInfo = selectQuestion($id);
?>

	<div class="container">
		<h2>What's your question?</h2>
		<hr>
		<br>
		<div class="center">
			<form name="ask" class="basic-grey" action="controllers/edit.controller.php" method="post" onsubmit="return validateAskForm()">
				<input type="hidden" name="q_id" value="<?php echo $id ?>">
				<input type="text" id="name" name="name" value="<?php echo $questionInfo["name"] ?>"><br>
				<input type="text" id="email" name="email" value="<?php echo $questionInfo["email"] ?>" ><br>
				<input type="text" id="topic" name="topic" value="<?php echo $questionInfo["topic"] ?>"><br>
				<textarea id="content" name="content" required><?php echo $questionInfo["content"] ?></textarea><br>
				<input type="submit" value="Edit">
			</form>
		</div>
	</div>
<script src="assets/js/validation.js"></script>
</body>
</html>