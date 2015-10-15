<script type="text/javascript" src="assets/js/functions.js"></script>
<?php
	$html_listAnswerItems ='
	<div class="answer-list-item" id="[[aid]]">
	<div class="vote-buttons">
							<input title="Click to vote up" onclick="vote(this.value, \'answer\', [[qid]], [[aid]])" type="submit" value="1" class="vote-up-button"">a</input> 
							<input title="Click to vote down" onclick="vote(this.value, \'answer\', [[qid]], [[aid]])" type="submit" value="-1" class="vote-down-button"> 
						</div>
						<div class="vote">
								<span class="vote-count">[[countvotes]]</span>
								<span> votes</span>
						</div>
						<div>
						[[aid]]  [[authorname]]  [[qid]] [[content]]  [[datetime]]  [[countvotes]] </div>
						
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