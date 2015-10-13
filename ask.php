<?php
	include "views/header.php";
?>

	<div class="container">
		<h2>What's your question?</h2>
		<hr>
		<br>
		<div class="center">
			<form name="ask" class="basic-grey" action="controllers/ask.controller.php" onsubmit="return validateAskForm()" method="post">
				<input type="text" id="name" name="name" placeholder="Name"><br>
				<input type="text" id="email" name="email" placeholder="Email"><br>
				<input type="text" id="topic" name="topic" placeholder="Question Topic"><br>
				<textarea id="content" name="content" placeholder="Content"></textarea><br>
				<input type="submit" value="Post">
			</form>
		</div>
	</div>
	
<script src="assets/js/validation.js"></script>
<?php include "views/footer.php";?>