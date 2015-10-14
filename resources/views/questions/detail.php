<div class='container'>
	<div class='votecell'>
		<a class='voteup' title='This answer is useful'></a>
		<span class='count'><?= $question->votes ?></span>
		<a class='votedown' title='This answer is not useful'></a>
	</div>
	<div class='question-detail'>
		<div class='detail'>
			<p><?= nl2br($question->content) ?></p>
		</div>
	</div>
	<span class='control'>
		<span>asked by <span class='username'><?= $question->name ?></span> at <?= $question->created_at ?> |</span>
		<span><a href='/questions/edit?id=<?= $question->id ?>'>edit </a></span>|
		<span><a href='/questions/delete?id=<?= $question->id ?>'>delete </a></span>
	</span>
</div>

<div class='card'>
	<h2>
		<?php if (isset($question->answers) && $question->answers > 0): ?>
			<?= $question->answers ?> Answers
		<?php else: ?>
			0 Answers
		<?php endif; ?>
	</h2>
</div>
