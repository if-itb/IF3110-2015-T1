<?php

class Answers extends Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('answersModel');
	}

	public function index() {

		show404("");

	}

	public function add($id){

		if (isset($_POST['action'])) {
			
			$answerID = $this->answersModel->createAnswer($_POST);

			if ($answerID) {
				header('Location: /index.php/questions/detail/'.$id);
			} else {
				echo "Something happen.";
			}

		} else {	
			
			show404();

		}
	}

	private function vote($id, $count) {
		
		$affectedRows = $this->answersModel->voteAnswer($id, $count);
		$response = new stdClass()	;

		if ($affectedRows == 1) {

			$result = $this->answersModel->getAnswer($id);

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