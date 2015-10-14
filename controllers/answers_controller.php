<?php
	class AnswersController {
		public function index($qid) {
			$answers = Answer::all($qid);
			require_once('views/answer/index.php');
		}
		
		public function insert() {
			echo $_POST['authorname'];
			if(isset($_POST['authorname']) && isset($_POST['authoremail']) && isset($_GET['qid']) && isset($_POST['content'])){
				echo 'ok';
				$authorname = $_POST['authorname'];
				$authoremail = $_POST['authoremail'];
				$content = $_POST['content'];
				$qid = $_GET['qid'];
				date_default_timezone_set('Asia/Jakarta');
				$datetime = date("Y-m-d H:i:s");
				
				$answer = new Answer('', $authorname, $authoremail, $qid, $content, $datetime, '');
				$answer->post();
			}
		}
	}
?>