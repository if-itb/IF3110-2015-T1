<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>Edit Question - Simple StackExchange</TITLE>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">

	</HEAD>
	<BODY>
		<?php
			if (!isset($_GET['qid'])){
				header("Location: QuestionForm.html");
				exit();
			}
			$qid=$_GET['qid'];
			
			include "dbmgr.php";

			$curQuestion = getQuestion($qid);

			if ($curQuestion==NULL){
				header("Location: QuestionForm.html");
				exit();
			}
		?>

		<H1>Simple StackExchange</H1>
		<H2>What's your question?</H2>
		<form action="updateQuestion.php" method="post">
			<input type="hidden" name="qid" value="<?php echo $qid; ?>">
			<div class="question-form-input">
				<input type="text" name="Name" placeholder="Name" class = "requiredInput" value="<?php echo $curQuestion['AuthorName']?>">
			</div>
			<div class="question-form-input">
				<input type="text" name="Email" placeholder="Email"  class = "requiredInput emailInput" value="<?php echo $curQuestion['Email']?>">
			</div>
			<div class="question-form-input">
				<input type="text" name="QuestionTopic" placeholder="Question Topic" class = "requiredInput" value="<?php echo $curQuestion['QuestionTopic']?>">
			</div>
			<div class="question-form-input">
				<textarea name="Content" placeholder="Content" class = "requiredInput"> <?php echo $curQuestion['Content']?></textarea>
			</div>
			<div class="question-form-input">
				<script src="formValidate.js"></script>
				<input type="submit" value="Post" onclick="return validateForm()" action="updateQuestion.php">
			</div>
		</form>
	</BODY>
</HTML>
