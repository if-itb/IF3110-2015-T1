<?php
	include '/models/question.php';
	class PagesController{
		public function home() {
			$questions = Question::all();
			//print_r ($questions);
			require_once('views/questions/index.php');
		}
		
	}
?>