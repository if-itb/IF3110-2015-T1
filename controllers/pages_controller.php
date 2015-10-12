<?php
	class PagesController{
		public function home() {
			$question = Question::all();
			require_once('views/pages/home.php');
		}
		
	}
?>