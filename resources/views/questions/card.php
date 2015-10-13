<div class='container card'>
	<div class='statistic'>
		<span class='count'><?= $votes ?></span>
		<span class='unit'>votes</span>
	</div>
	<div class='statistic'>
		<span class='count'><?= $answers ?></span>
		<span class='unit'>answers</span>
	</div>
	<div class='question-detail'>
		<div class='topic'><a href='/questions?id=<?= $id ?>'><?= $topic ?></a></div>
		<div class='detail'><?= $content ?></div>
		<span class='control'>
			<span>asked by <span class='username'><?= $name ?></span> at <?= $created_at ?> |</span>
			<span><a href='/questions/edit?id=<?= $id ?>'>edit </a></span>|
			<span><a href='/questions/delete?id=<?= $id ?>'>delete </a></span>
		</span>
	</div>
	<div class='control'></div>
</div>
