<?php
	$questionDiv = '<div id="question{{id}}" class="innerContent">
	<div class="col countVotes">
		<div>
			<span>{{vote}}</span>
		</div>
		<div>
			Votes
		</div>
	</div>
	<div class="col countAnswers">
		<div>
			<span>{{answer}}</span>
		</div>
		<div>
			Answers
		</div>
	</div>
	<div class="col topic">
		<div>
			<a class="link" href="question.php?id={{id}}"><h3>{{topic}}</h3></a>
		</div>
		<div>
			<p>{{content}}</p>
		</div>
	</div>
	<div class="col navPost">
		<p>
			asked by {{name}} | <a class="link edit" href="askhere.php?id={{id}}"> edit</a> | <a class="link delete" href="index.php?delete=true&id={{id}}"> delete </a>
		</p>
	</div>
</div>';
?>