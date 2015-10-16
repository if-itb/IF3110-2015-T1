<?php 
	class AnswerController {
		public function show($threadId) {
			$answers = Answer::answerFor($threadId);
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'answer.php');
		} 

		public function upvote() {
			$id = $_POST['params'];
			Answer::upvote($id);
		}

		public function downvote() {
			$id = $_POST['params'];
			Answer::downvote($id);
		}
	}
?>