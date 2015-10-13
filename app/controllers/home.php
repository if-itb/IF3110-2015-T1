<?php

class Home extends Controller {
    
    public function index() {
        $questionsModel = $this->model('Questions');
        $answersModel = $this->model('Answers');
        
        $questions = $questionsModel->getAll();
        
        $this->view('templates/header');
        $this->view('home/index', ['questions' => $questions]);
        $this->view('templates/footer');
    }
}