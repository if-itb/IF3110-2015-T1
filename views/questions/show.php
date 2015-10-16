<?php
	$html_questionItem = '
	
	<div class="question-item" id="q-[[qid]]">
		<h1>
			<a href="?controller=questions&action=show&qid=[[qid]]">[[topic]]</a>		
		</h1>
		<div class="question-item-wrapper">
			<div class="question-item-stats">
				<div class="vote-buttons">
					<input onclick="vote(this.value, \'question\', [[qid]])" type="submit" value="1" class="vote-up-button"">
					<div class="vote">
						[[countvotes]]
					</div>
					<input onclick="vote(this.value, \'question\', [[qid]])" type="submit" value="-1" class="vote-down-button"> 
				</div>

				<div class="clearfix"></div>
			</div>
			
			<div class="question-item-main">
				<div class="question-item-content">
					[[content]]
				</div>

				<div class="question-item-metadata">
					asked by <span><a class="a-blue" href="/">[[authorname]]</a></span> at [[datetime]] |
					<span><a class="a-orange"href="?controller=questions&action=edit&qid=[[qid]]">edit</a></span> |
					<span><a class="a-red" href="?controller=questions&action=delete&qid=[[qid]]">delete</a></span>
				</div>
				
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<h1>
			[[countanswers]] Answer
		</h1>
		
	</div>

				<div class="clearfix"></div>';

	$strMask = array("[[qid]]", "[[authorname]]", "[[content]]", "[[topic]]", "[[datetime]]", "[[countvotes]]", "[[countanswers]]");
	$strTarget = array($question->qid, $question->authorname, $question->content, $question->topic, $question->datetime, $question->countvotes, $question->countanswers);
	echo str_replace($strMask, $strTarget, $html_questionItem);

	require_once 'views/answers/index.php';
	require_once 'views/answers/form.php';


?>