<?php
	class QuestionsController {
		public function index() {
			$question = Question::all();
			require_once('views/question/index.php');
		}
		
		public function show() {
			include '/models/answer.php';
			
			$answers = Answer::all();
			
			if(!isset($_GET['qid'])){
				return call('pages', 'error');	
			}
			
			$question = Question::get($_GET['qid']);
			require_once('views/question/show.php');
		}
	}
?>