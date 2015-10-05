<?php
	$singleQuestion = '
		<h1 class="tag">{{topic}}</h1>
		<div class="innerContent fQuestion">
			<div class="col votesCount">
				<div id="upQuestion{{id}}">
					<i class="material-icons md-48">arrow_drop_up</i>
				</div>
				<div id="questionVote{{id}}">
					{{vote}}
				</div>
				<div id="downQuestion{{id}}">
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
					asked by {{name}} at {{date}} | <a class="link edit" href="askhere.php?id={{id}}"> edit</a> | <a class="link delete" href="#"> delete </a>
				</p>
			</div>
		</div>';
?>