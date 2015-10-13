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
		
		public function insert() {
			
			if(isset($_POST['authorname']) && isset($_POST['authoremail']) && $_POST['topic'] && $_POST['content']){
				$authorname = $_POST['authorname'];
				$authoremail = $_POST['authoremail'];
				$topic = $_POST['topic'];
				$content = $_POST['content'];	 
				$datetime = date("Y-m-d H:i:s");
				
				$question = new Question('', $authorname, $authoremail, $topic, $content, $datetime, '', '');
				$question->post();
			}
			
			require_once('views/questions/form.php');
	
		}
	}
?>