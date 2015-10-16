<?php
	$answerDiv = '<div id="answeraid"" class="answerContent">
	<div class="voteFunc col text-center">
		<div>
			<div class="votes-up" onclick="vote(aid, \'vUp\', \'answer\')"></div>
		</div>
		<div id="voteCount_aaid">
			{votes}
		</div>
		<div>
			<div class="votes-down" onclick="vote(aid, \'vDown\', \'answer\')"></div>
		</div>
		</div>
		<div class="sinanswerContent col">
			<p>
				{answerContent}
			</p>
		</div>
		<div class="answer-info">
			<p>
				answered by {name} at {date}
			</p>
		</div>
	<div class="bottom-line"></div>
	</div>';
?>