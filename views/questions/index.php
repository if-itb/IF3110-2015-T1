<script type="text/javascript" src="assets/js/functions.js"></script>

<?php
	$html_listQuestionItem = '
			<div class="question-list-item" id="q-[[qid]]">

				<div class="question-item-stats">
					<div class="vote-wrapper">
						<div>[[countvotes]]</div>
						<div> votes</div>
						<div class="vote-clear"></div>
					</div>

					<div class="answer-count">
						<div>[[countanswers]]</div>
						<div> answers</div>
					</div>
				</div>

				<div class="question-item-main">
					<div class="question-item-title">
						<a href="?controller=questions&action=show&qid=[[qid]]">[[topic]]</a>		
					</div>
					<span class="question-item-metadata">
							asked by
							<span><a class="a-blue" >[[authorname]]</a></span> |
							<span><a class="a-orange" href="?controller=questions&action=edit&qid=[[qid]]">edit</a></span> |
							<span><a class="a-red" href="?controller=questions&action=delete&qid=[[qid]]">delete</a></span>
					</span>
				</div>

				<div class="clearfix"></div>
			</div> <!-- END question-list-item -->
			';
	$strMask = array("[[qid]]", "[[authorname]]", "[[topic]]", "[[datetime]]", "[[countvotes]]", "[[countanswers]]");
foreach($questions as $question){
	$strTarget = array($question->qid, $question->authorname, $question->topic, $question->datetime, $question->countvotes, $question->countanswers);
			echo str_replace($strMask, $strTarget, $html_listQuestionItem);
	}
?>