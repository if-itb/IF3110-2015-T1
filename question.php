<?php
	include "views/header.php";
	require_once "views/question.view.php";
?>
	<div class="container">
	<?php
		$id = $_GET["q_id"];
		showQuestion($id);
		showAnswers($id);
	?>
		<br><br>
		<div class="center">
			<form class="basic-grey" name= "answer" action="controllers/answer.controller.php" onsubmit="return validateAnswerForm()" method="post">
				<input type="hidden" name="q_id" value="<?php echo $id ?>">
				<input type="text" id="name" name="name" placeholder="Name"><br>
				<input type="text" id="email" name="email" placeholder="Email"><br>
				<textarea id="content" name="content" placeholder="Content" ></textarea><br>
				<input type="submit" value="Post">
			</form>
		</div>
	</div>

<script src="assets/js/validation.js"></script>
<script src="assets/js/script.js"></script>
<?php include "views/footer.php";?>