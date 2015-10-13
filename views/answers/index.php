<?php

	$html_listAnswerItems ='[[aid]]  [[authorname]]  [[qid]] [[content]]  [[datetime]]  [[countvotes]]';

	$strMask = array("[[aid]]", "[[authorname]]", "[[qid]]", "[[content]]", "[[datetime]]", "[[countvotes]]");
//print_r($answers);
foreach($answers as $answer){
	$strTarget = array($answer->aid, $answer->authorname, $answer->qid, $answer->content, $answer->datetime, $answer->countvotes);
			echo str_replace($strMask, $strTarget, $html_listAnswerItems);
}
	
?>