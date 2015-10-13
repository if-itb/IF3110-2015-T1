<?php
	class QuestionsController {
		public function index() {
			$questions = Question::all();
			require_once('views/question/index.php');
		}
		
		public function show() {
			include '/models/answer.php';
			
			$qid = $_GET['qid'];
			
			if(!isset($qid)){
				return call('pages', 'error');	
			}
			
			$answers = Answer::all($qid);
			
			$question = Question::get($_GET['qid']);
			require_once('views/questions/show.php');
		}
	}
?>