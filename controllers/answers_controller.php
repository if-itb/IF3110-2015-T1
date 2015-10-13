<?php
	class AnswersController {
		public function index($qid) {
			$answers = Answer::all($qid);
			require_once('views/answer/index.php');
		}
	}
?>