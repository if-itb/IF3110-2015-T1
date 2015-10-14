<?php foreach($answers as $answer): ?>
	<div class='container card'>
		<div class='statistic'>
			<span class='count'></span>
			<span class='unit'></span>
		</div>
		<div class='answer-detail'>
			<div class='detail'><?= $answer->content ?></div>
		</div>
	</div>
<?php endforeach; ?>

