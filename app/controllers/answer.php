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
                "content"       => $_POST['content']
            );

            $answersModel = $this->model('Answers');
            $answersModel->add($data);

        }

        echo "Error 404";
    }

    public function edit() {

    }

    public function delete() {

    }
}