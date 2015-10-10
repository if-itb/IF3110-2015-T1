<?php include("header.php"); ?>

		<?php
			include("questionCheck.php");
		?>

		<?php include("questionRequestQuestion.php") ?>
		<div class="containerAnswer">
			<?php include("questionRequestAnswer.php"); ?>
		</div>

		<div id="answerForm">
			<h1 class="tag">Your Answer</h1>
			<form onsubmit="return validasi(this);" class="form makeQuestion" action="question.php?id=<?php echo $_GET["id"] ?>" method="POST">
				<div class="innerForm">
					<input class="textForm" type="text" placeholder="Name" name="name">
				</div>
				<div class="innerForm">
					<input class="textForm" type="email" placeholder="Email" name="email">
				</div>
				<div class="innerForm">
					<textarea class="textArea" name="content" placeholder="Content"></textarea>
				</div>
				<div class="innerForm">
					<input class="submitButton" type="submit" value="Post">
				</div>
			</form>
		</div>
	
<?php include("footer.php"); ?>