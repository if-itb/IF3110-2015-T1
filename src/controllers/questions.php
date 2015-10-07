<?php

class Questions extends Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('questionsModel');
		$this->load->model('answersModel');
	}

	public function index() {

		$data['listQuestions'] = $this->questionsModel->listQuestions();
		$data['subHeader'] = "Recently Added Questions";
		// list

		$this->load->view('template/header');
		$this->load->view('main', $data);
		$this->load->view('template/footer');
	}


	public function ask() {

		if (isset($_POST['action'])) {
			
			$id = $this->questionsModel->createQuestion($_POST);

			if ($id) {
				header('Location: /index.php/questions/detail/'.$id);
			} else {
				echo "Something happen.";
			}

		} else {
			$data['action'] = 'submit';
			$data['actionURL'] = '/index.php/questions/ask';

			$this->load->view('template/header');
			$this->load->view('form', $data);
			$this->load->view('template/footer');
		}

	}

	public function detail($id = 0) {

		if ($id == 0) {
			show404('tidak ditemukan');
		} else {

			$data['question'] = $this->questionsModel->getQuestion($id);
			$data['answersArray'] = $this->answersModel->listAnswers($id);
			$data['actionURL'] = '/index.php/answers/add/'.$id;
			
			$this->load->view('template/header');
			$this->load->view('detail', $data);
			$this->load->view('template/footer');
		}
		
	}

	public function search() {

		if (isset($_GET['q'])) {
			$keyword = $_GET['q'];

			$data['listQuestions'] = $this->questionsModel->searchQuestions($keyword);
			$data['subHeader'] = "Related to '".$keyword."':";
			$data['keyword'] = $keyword;

			// list

			$this->load->view('template/header');
			$this->load->view('main', $data);
			$this->load->view('template/footer');

		} else {
			show404("");
		}
		
	}

	public function edit($id = 0) {

		if ($id!=0) {

			if (isset($_POST['action'])) {
				$affectedRows = $this->questionsModel->updateQuestion($id, $_POST);
				header('Location: /index.php/questions/detail/'.$id);
			} else {
				$data['action'] = 'update';
				$data['actionURL'] = '/index.php/questions/edit/'.$id;

				$data['question'] = $this->questionsModel->getQuestion($id);

				$this->load->view('template/header');
				$this->load->view('form', $data);
				$this->load->view('template/footer');
			}

		} else {
			show404("Pertanyaan tidak ditemukan");
		}
	}

	public function delete($id = 0) {

		if ($id!=0) {

			$affectedRows = $this->questionsModel->deleteQuestion($id);
			
			if ($affectedRows) {
				header('Location: /index.php/questions/detail/'.$id);
			} else {
				echo "Something happen.";
			}

			header('Location: /index.php');

		} else {
			show404("Pertanyaan tidak ditemukan");
		}

	}

	private function vote($id, $count) {
		
		$affectedRows = $this->questionsModel->voteQuestion($id, $count);
		$response = new stdClass()	;

		if ($affectedRows == 1) {

			$result = $this->questionsModel->getQuestion($id);

			if ($result != false) {

				$response->status = "1";
				$response->voters = $result["voters"];

			} else {

				$response->status = "0";
				$response->message = "Something happened. (err: fetch_update)";	

			}

		} else {

			$response->status = "0";
			$response->message = "Something happened. (err: vote_update)";
		
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function voteUp() {
		$id=$_POST['id'];
		$this->vote($id, 1);
	}

	public function voteDown() {
		$id=$_POST['id'];
		$this->vote($id,-1);
	}

}