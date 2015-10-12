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
        if (isset($_POST['name'])   &&
            isset($_POST['name'])   &&
            isset($_POST['email'])  &&
            isset($_POST['topic'])  &&
            isset($_POST['content'])
            ) {

            $data = array (
                "name"     => $_POST['name'],
                "email"    => $_POST['email'],
                "topic"    => $_POST['topic'],
                "content"  => $_POST['content']
            );

            $questionsModel = $this->model('Questions');
            $questionsModel->add($data);

        } else {
            $this->view('templates/header');
            $this->view('question/add');
            $this->view('templates/footer');
        }
    }

    public function edit($id = null) {
        
        if (isset($_POST['name'])   &&
            isset($_POST['name'])   &&
            isset($_POST['email'])  &&
            isset($_POST['topic'])  &&
            isset($_POST['content'])
            ) {

            $data = array (
                "id_question"   => $_POST['id_question'],
                "name"          => $_POST['name'],
                "email"         => $_POST['email'],
                "topic"         => $_POST['topic'],
                "content"       => $_POST['content']
            );

            $questionsModel = $this->model('Questions');
            $questionsModel->edit($data);

        }

        if ($id) {
            $id = (int)$id;

            $questionsModel = $this->model('Questions');
            $question = $questionsModel->get($id);

            if ($question) {
                $this->view('templates/header');
                $this->view('question/edit', ['question' => $question]);
                $this->view('templates/footer');
            }
        }
    }

    public function delete() {

    }
}