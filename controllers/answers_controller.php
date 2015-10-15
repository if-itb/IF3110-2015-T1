<?php
	class AnswersController {
		public function index($qid) {
			$answers = Answer::all($qid);
			require_once('views/answer/index.php');
		}
		
		public function insert() {
			
			if(isset($_POST['authorname']) && isset($_POST['authoremail']) && isset($_GET['qid']) && isset($_POST['content'])){
				echo 'ok';
				$authorname = $_POST['authorname'];
				$authoremail = $_POST['authoremail'];
				$content = $_POST['content'];
				$qid = $_GET['qid'];
				date_default_timezone_set('Asia/Jakarta');
				$datetime = date("Y-m-d H:i:s");
				
				$url= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' ."{$_SERVER['HTTP_HOST']}".'/if3110-2015-t1/?controller=questions&action=show&qid='.$qid;
				
				$answer = new Answer('', $authorname, $authoremail, $qid, $content, $datetime, '');
				$answer->post();
				
				header('Location: '.$url);
				die();
			}
		}
		
		public function vote() {
			
			$vote = intval($_GET['vote']);
			$qid = intval($_GET['qid']);
			$aid = intval($_GET['aid']);
			echo Answer::vote($vote, $qid, $aid);
			
		}
	}

	if(isset($_GET['action'])){
		if($_GET['action'] == 'vote'){
				require_once('../connection.php');
				require_once('../models/answer.php');
				AnswersController::vote();
		}
	}
?>