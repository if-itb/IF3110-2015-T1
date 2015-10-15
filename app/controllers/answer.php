<?php

class Answer extends Controller {
    
    public function index() {
        echo "Error 404";
    }

    public function add() {
        if (isset($_POST['id_question']) &&
            isset($_POST['name'])        &&
            isset($_POST['email'])       &&
            isset($_POST['content'])
            ) {

            var_dump("aaa");
            $data = array (
                "id_question"   => $_POST['id_question'],
                "name"          => $_POST['name'],
                "email"         => $_POST['email'],
                "content"       => htmlspecialchars($_POST['content'])
            );

            $answersModel = $this->model('Answers');
            $answersModel->add($data);

        }

        echo "Error 404";
    }

    public function edit($id = null) {

        if (isset($_POST['id_answer']) &&
            isset($_POST['id_question']) &&
            isset($_POST['name'])        &&
            isset($_POST['email'])       &&
            isset($_POST['content'])
            ) {

            $data = array (
                "id_answer"     => $_POST['id_answer'],
                "id_question"   => $_POST['id_question'],
                "name"          => $_POST['name'],
                "email"         => $_POST['email'],
                "content"       => htmlspecialchars($_POST['content'])
            );

            $answersModel = $this->model('Answers');
            $answersModel->edit($data);
        }

        if ($id) {
            $id = (int)$id;

            $answersModel = $this->model('Answers');
            $answer = $answersModel->getAnswerById($id);

            if ($answer) {
                $this->view('templates/header');
                $this->view('answer/edit', ['answer' => $answer]);
                $this->view('templates/footer');
            }
        }
    }

    public function delete() {
        if (isset($_POST['id_answer'])) {
            $answersModel = $this->model('Answers');
            $answersModel->delete($_POST['id_answer']);
        } else {
            echo "Error 404";
        }
    }
}