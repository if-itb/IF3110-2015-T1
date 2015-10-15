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
			
			$question = Question::get($qid);
			$answers = Answer::all($qid);
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
		
		public function vote() {
			
			$vote = intval($_GET['vote']);
			$qid = intval($_GET['qid']);
			echo Question::vote($vote, $qid);
			
		}
		
		public function edit() {
			$qid = $_GET['qid'];
			$question = Question::get($qid);
			require_once('views/questions/formedit.php');
		}
		
		public function update() {
			if(isset($_POST['authorname']) && isset($_POST['authoremail']) && $_POST['topic'] && $_POST['content'] && $_GET['qid']){
				$authorname = $_POST['authorname'];
				$authoremail = $_POST['authoremail'];
				$topic = $_POST['topic'];
				$content = $_POST['content'];	 
				$datetime = date("Y-m-d H:i:s");
				$qid = $_GET['qid'];
				
				$question = new Question($qid, $authorname, $authoremail, $topic, $content, $datetime, '', '');
				$question->update();
				
			}
				
		}
		
		public function delete() {
			
		}
	}


	
	if(isset($_GET['action'])){
		if($_GET['action'] == 'vote'){
				require_once('../connection.php');
				require_once('../models/question.php');
				QuestionsController::vote();
		}
	}

?>