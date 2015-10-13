<?php
	$questionDiv = '<div id="question{qid}" class="questionContent">
	<div class="vote text-center col">
		<p>{vote}<br>vote</p>
	</div>
	<div class="answer text-center col">
		<p>{answer}<br>answer</p>
	</div>
	<div class="question text-center col">
			<p><strong><a href="question.php?id={id}">{topic}</a></strong> <br> <br>
			{question}</p>
	</div>
	<div class="col question-info">
		<p>
			asked by {name} | <a class="edit" href="ask.php?qid={qid}"> edit</a> | <a class="delete" href="index.php?delete=true&id={id}" onclick="return validateDelete();"> delete </a>
		</p>
	</div>
	<div class="bottom-line"></div>
</div>';
?>