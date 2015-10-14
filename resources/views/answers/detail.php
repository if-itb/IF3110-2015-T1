<?php foreach($answers as $answer): ?>
	<div class='container card'>
		<div class='votecell'>
			<a class='voteup' title='This answer is useful'></a>
			<span class='count'><?= $answer->votes ?></span>
			<a class='votedown' title='This answer is not useful'></a>
		</div>
		<div class='answer-detail'>
			<div class='detail'><?= $answer->content ?></div>
		</div>
		<span class='control'>
			<span>asked by <span class='username'><?= $answer->name ?></span> at <?= $answer->created_at ?></span>
		</span>
	</div>
<?php endforeach; ?>

