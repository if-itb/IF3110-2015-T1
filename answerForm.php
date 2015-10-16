<?php
	$answerForm = '<div class="answer-form">
		<h1>Your Answer</h1>
		<form name="answerForm" onsubmit="return validateAnsForm();" action="questionAnswerReq.php?qid={qid}" method="POST">
			<div class="form">	
				<input class="formContent" type="text" name="name" placeholder="Name" value="">
			</div>
			<div class="form">
				<input class="formContent" type="text" name="email" placeholder="Email" value="">
			</div>
			<div class="textArea">
				<textarea class="formContent" name="content" placeholder="Contents" rows="10"></textarea>
			</div>
				<input class="button" type="submit" value="Submit">
		</form>
	</div>';
	$answerForm = str_replace("{qid}", $_GET["qid"], $answerForm);
	echo $answerForm;
?>