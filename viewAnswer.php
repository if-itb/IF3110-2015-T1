<?php 
	$answerDiv = '
<div id="answer{{id}}" class="innerContent fAnswer">
	<div class="col votesCount">
		<div class="up vote" id="upAnswer{{id}}">
			<i class="material-icons md-48">arrow_drop_up</i>
		</div>
		<div id="answerVote{{id}}">
			{{vote}}
		</div>
		<div class="down vote" id="downAnswer{{id}}">
			<i class="material-icons md-48">arrow_drop_down</i>
		</div>
	</div>
	<div class="col content">
		<p>
			{{content}}
		</p>
	</div>
	<div class="navPost2">
		<p>
			answered by {{name}} at {{date}}
		</p>
	</div>
</div>'
 ?>