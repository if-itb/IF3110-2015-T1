<?php foreach($answers as $answer): ?>
	<div class='container card'>
		<div class='votecell'>
			<a class='voteup' answer-id=<?= $answer->id?> title='This answer is useful'></a>
			<span class='count'><?= $answer->votes ?></span>
			<a class='votedown' answer-id=<?= $answer->id ?> title='This answer is not useful'></a>
		</div>
		<div class='answer-detail'>
			<div class='detail'><?= $answer->content ?></div>
		</div>
		<span class='control'>
			<span>
				asked by
				<span class='username'><?= $answer->name ?></span>
				(<span class='email'><?= $answer->email ?></span>)
				at <?= $answer->created_at ?>
			</span>
		</span>
	</div>
<?php endforeach; ?>

