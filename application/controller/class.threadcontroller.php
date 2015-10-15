<?php 
	class ThreadController {
		public function home() {
			$threads = Thread::all();
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'home.php');
		}

		public function detail($queryString) {
			$thread = Thread::threadById($queryString);
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'detail.php');

			require_once(ROOT . DS . 'application' . DS . 'model'. DS . 'class.answer.php');
			require_once(ROOT . DS . 'application' . DS . 'controller'. DS . 'class.answercontroller.php');
			$answerController = new AnswerController();
			$answerController->show($queryString);
		}

		public function form() {
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'form.php');
		}

		public function post() {
			$user_name = $_POST['user_name'];
			$user_email = $_POST['user_email'];
			$thread_topic = $_POST['thread_topic'];
			$thread_content = $_POST['thread_content'];
			Thread::post($user_name, $user_email, $thread_topic, $thread_content);
			header("Location: index.php");
		}

		public function formUpdate($queryString) {
			$thread = Thread::threadById($queryString);
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'update.php');
		}

		public function update($queryString) {
			$user_name = $_POST['user_name'];
			$user_email = $_POST['user_email'];
			$thread_topic = $_POST['thread_topic'];
			$thread_content = $_POST['thread_content'];
			Thread::update($queryString, $user_name, $user_email, $thread_topic, $thread_content);
			header("Location: index.php");
		}

		public function delete($queryString) {
			Thread::delete($queryString);
			header("Location: index.php");
		}

		public function error() {
			require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'error.php');
		}
	}
?>