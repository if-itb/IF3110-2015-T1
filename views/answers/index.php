<script type="text/javascript" src="assets/js/functions.js"></script>
<?php
	$html_listAnswerItems ='
	<div class="answer-list-item" id="a-[[aid]]">
	<div class="answer-item-wrapper">
			<div class="answer-item-stats">
				<div class="vote-buttons">
					<input onclick="vote(this.value, \'answer\', [[qid]], [[aid]])" type="submit" value="1" class="vote-up-button"">
					<div class="vote">
						[[countvotes]]
					</div>
					<input onclick="vote(this.value, \'answer\', [[qid]], [[aid]])" type="submit" value="-1" class="vote-down-button"> 
				</div>

				<div class="clearfix"></div>
			</div>
			
			<div class="answer-item-main">
				<div class="answer-item-content">
					[[content]]
				</div>

				<div class="answer-item-metadata">
					answered by <span><a class="a-blue" href="/">[[authorname]]</a></span> at [[datetime]]
				</div>
				
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
						</div>';

	$strMask = array("[[aid]]", "[[authorname]]", "[[qid]]", "[[content]]", "[[datetime]]", "[[countvotes]]");
//print_r($answers);
if(isset($answers)){
	foreach($answers as $answer){
		$strTarget = array($answer->aid, $answer->authorname, $answer->qid, $answer->content, $answer->datetime, $answer->countvotes);
				echo str_replace($strMask, $strTarget, $html_listAnswerItems);
	}
}
?>