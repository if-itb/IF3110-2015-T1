<form class="form-wrapper">
	<input type="text" placeholder="Search here..." required>
	<button type="submit">Search</button>
	<div class="clearfix"></div>
	<div id="suggestion">
			Cannot find what you are looking for? <a href="/">ask here</a>.
	</div>
</form>

<h1>
	Recently Asked Questions
</h1>
				
<div class="question-list">

<?php
	$html_question = '
		<div class="question-list-item" id="q1">

			<div class="question-item-stats">
				<div class="vote-wrapper">

					<div class="vote-buttons">
						<input title="Click to vote up" name="vote" onclick="" type="submit" value="+" class="vote-up-button"> 
						<input title="Click to vote down" name="vote" onclick="" type="submit" value="–" class="vote-down-button"> 
					</div>

					<div class="vote-count">
						<span class="vote-count-data">
							<span>[[countVotes]]</span>
							<span> votes</span>
						</span>
					</div>

					<div class="vote-clear"></div>
				</div>

				<div class="answer-count">
					<span>[[countAnswers]]</span>
					<span> answers</span>
				</div>
			</div>

			<div class="question-item-main">
				<div class="question-item-title">
					<a href="/">[[title]]</a>		
				</div>
				<span class="question-item-metadata">
						asked by
						<span><a href="/">[[username]]</a></span> |
						<span><a href="/">edit</a></span> |
						<span><a href="/">delete</a></span> |
						[[datetime]]
				</span>
			</div>

			<div class="clearfix"></div>
		</div> <!-- END question-list-item -->
		';

	displayListQuestion($html_question,$db);
	?>
</div> <!-- END question-list -->