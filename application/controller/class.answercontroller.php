<?php 
	class AnswerController {
		public function show($threadId) {
			$answers = Answer::answerFor($threadId);
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'answer.php');
		} 
	}
?>