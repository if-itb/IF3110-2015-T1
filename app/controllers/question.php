<?php

class Question extends Controller {
    
    public function index($id = null) {
        $questionsModel = $this->model('Questions');
        $answersModel = $this->model('Answers');

        if ($id) {
            $id = (int)$id;
            
            $question = $questionsModel->get($id);
            $answers = $answersModel->getAnswerByIdQuestion($id);

            if ($question) {
                $this->view('templates/header');
                $this->view('question/index', ['question' => $question, 'answers' => $answers]);
                $this->view('templates/footer');
            }
        } else {
            echo "Error 404";
        }
    }

    public function add() {
        if (isset($_POST['name'])   &&
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
        if (isset($_POST['id_question'])) {
            $questionsModel = $this->model('Questions');
            $questionsModel->delete($_POST['id_question']);
        } else {
            echo "Error 404";
        }
    }
}