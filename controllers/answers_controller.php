<?php
	class AnswersController {
		public function index() {
			$answer = Answer::all();
			require_once('views/answer/index.php');
		}
	}
?>