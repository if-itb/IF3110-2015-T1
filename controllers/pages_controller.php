<?php
	class PagesController{
		public function home() {
			include '/models/question.php';
			$questions = Question::all();
			require_once('views/pages/home.php');
		}
		
		public function error() {
			require_once('views/pages/error.php');
		}
		
	}
?>