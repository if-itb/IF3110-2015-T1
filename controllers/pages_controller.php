<?php
	
	class PagesController{
		public function home() {
			include '/models/question.php';
			
			$questions = Question::all();
			//print_r ($questions);
			require_once('views/questions/index.php');
		}
		
	}
?>