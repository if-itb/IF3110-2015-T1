<?php

	$html_listAnswerItem ='';

	$strMask = array("[[aid]]", "[[authorname]]", "[[authoremail]]", "[[qid]]", "[[content]]", "[[datetime]]", "[[countvotes]]");
foreach($answers as $answer){
	$strTarget = array($answer->aid, $answer->authorname, $answer->authoremail, $answer->qid, $answer->content, $answer->datetime, $answer->countvotes);
			echo str_replace($strMask, $strTarget, $html_listAnswerItem);
	
?>