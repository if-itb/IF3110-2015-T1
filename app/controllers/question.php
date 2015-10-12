<?php

class Question extends Controller {
    
    public function index() {
        $this->view('templates/header');
        $this->view('question/index');
        $this->view('templates/footer');
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