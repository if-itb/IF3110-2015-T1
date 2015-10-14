<?php foreach($questions as $question): ?>
<div class='container card'>
	<div class='statistic'>
		<span class='count'><?= $question->votes ?></span>
		<span class='unit'>votes</span>
	</div>
	<div class='statistic'>
		<span class='count'><?= $question->answers ?></span>
		<span class='unit'>answers</span>
	</div>
	<div class='question-detail'>
		<div class='topic'><a href='/questions?id=<?= $question->id ?>'><?= $question->topic ?></a></div>
		<div class='detail'>
			<p><?= nl2br($question->content) ?></p>
		</div>
	</div>
	<span class='control'>
		<span>
			asked by 
			<span class='username'><?= $question->name ?></span>
			(<span class='email'><?= $question->email ?></span>)
			at <?= $question->created_at ?> |
			</span>
		<span><a href='/questions/edit?id=<?= $question->id ?>'>edit </a></span>|
		<span><a href='/questions/delete?id=<?= $question->id ?>'>delete </a></span>
	</span>
</div>
<?php endforeach; ?>
