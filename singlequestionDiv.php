<?php
	$singlequestionDiv = '<h1>{topic}</h1>
	<div class="bottom-line"></div>
	<div class="singleQuestion">
		<div class="votesFunc col text-center">
			<div>
				<span class="votes-up">Up</span>
			</div>
			<div>
				{votes}
			</div>
			<div>
				<span class="votes-down">Down</span>
			</div>
		</div>
		<div class="sinquestionContent col">
			<p>
				{content}
			</p>
		</div>
		<div class="sinquestion-info">
			<p>
				asked by <span>{name}</span> at {datetime} | <a class="edit" href="ask.php?qid={qid}"> edit</a> | <a class="delete" href="index.php?delete=true&qid={qid}" onclick="return validateDelete();"> delete </a>
			</p>
		</div>
	</div>

	<h1>{answer} Answer</h1>
	<div class="question-answer">
	<div class="bottom-line"></div>';

?>