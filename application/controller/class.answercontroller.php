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

		public function post($thread_id) {
			$user_name = $_POST['user_name'];
			$user_email = $_POST['user_email'];
			$answer_content = $_POST['answer_content'];
			Answer::post($user_name, $user_email, $answer_content, $thread_id);
			header("Location: index.php?controller=thread&action=detail&query=$thread_id");
		}
	}
?>