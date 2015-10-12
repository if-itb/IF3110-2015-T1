<?php
	class QuestionController {
		public function index() {
			$question = Question::all();
			require_once('views/question/index.php');
		}
		
		public function show() {
			if(!isset($_GET['qid'])){
				return call('pages', 'error');	
			}
			
			$question = Question::find($_GET['qid']);
			require_once('views/question/show.php');
		}
	}
?>