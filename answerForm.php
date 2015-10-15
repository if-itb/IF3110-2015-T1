<?php
	$answerForm = '<div class="answer-form">
		<h1>Your Answer</h1>
		<form action="questionAnswerReq.php?qid={qid}" method="POST">
			<div class="form">
				<input class="formContent" type="text" name="name" placeholder="Name" size="139px">
			</div>
			<div class="form">
				<input class="formContent" type="text" name="email" placeholder="Email" size="139px">
			</div>
			<div class="textArea">
				<textarea class="formContent" name="content" placeholder="Contents" rows="10" cols="141"></textarea>
			</div>
				<input class="button" type="submit" value="Post">
		</form>
	</div>';
	$answerForm = str_replace("{qid}", $_GET["qid"], $answerForm);
	echo $answerForm;
?>