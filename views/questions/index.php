<?php
	$html_listQuestionItem = '
			<div class="question-list-item" id="[[qid]]">

				<div class="question-item-stats">
					<div class="vote-wrapper">

						<div class="vote-buttons">
							<input title="Click to vote up" onclick="vote(this.value, \'question\', [[qid]])" type="submit" value="1" class="vote-up-button"">a</input> 
							<input title="Click to vote down" onclick="vote(this.value, \'question\', [[qid]])" type="submit" value="-1" class="vote-down-button"> 
						</div>

						<div class="vote">
								<span class="vote-count">[[countVotes]]</span>
								<span> votes</span>
						</div>

						<div class="vote-clear"></div>
					</div>

					<div class="answer-count">
						<span class="countanswers">[[countAnswers]]</span>
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
	$strMask = array("[[qid]]","[[title]]", "[[datetime]]", "[[username]]", "[[countVotes]]", "[[countAnswers]]");
foreach($questions as $question){
	$strTarget = array();
			echo str_replace($strMask, $strTarget, $html_listQuestionItem);
	}
?>