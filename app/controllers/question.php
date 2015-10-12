<?php

class Question extends Controller {
    
    public function index($id = null) {
        $questionsModel = $this->model('Questions');

        if ($id) {
            $id = (int)$id;
            
            if ($question = $questionsModel->get($id)) {
                $this->view('templates/header');
                $this->view('question/index', ['question' => $question]);
                $this->view('templates/footer');
            }
        }
    }

    public function add() {
        $this->view('templates/header');
        $this->view('question/add');
        $this->view('templates/footer');
    }

    public function edit() {

    }

    public function delete() {

    }
}