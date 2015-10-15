<?php

class Home extends Controller {
    
    public function index() {
        $questionsModel = $this->model('Questions');

        if (isset($_GET['s'])) {
            $questions = $questionsModel->search($_GET['s']);
        } else {
            $questions = $questionsModel->getAll();
        }

        $this->view('templates/header');
        $this->view('home/index', ['questions' => $questions]);
        $this->view('templates/footer');
    }
}