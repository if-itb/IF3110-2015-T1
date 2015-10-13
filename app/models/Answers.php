<?php

class Answers {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;    
    }

    public function getAnswerByIdQuestion($id) {
        $query = "SELECT * FROM answers WHERE id_question = {$id}";
        
        if ($answers = $this->db->query($query)) {
            return $answers->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getAnswerById($id) {
        $query = "SELECT * FROM answers WHERE id_answer = {$id}";
        
        if ($answers = $this->db->query($query)) {
            return $answers->fetch(PDO::FETCH_OBJ);
        }   
    }

    public function add($data) {
        $id_question    = $data['id_question'];
        $name           = $data['name'];
        $email          = $data['email'];
        $content        = $data['content'];

        $query = "INSERT INTO answers (id_question, name, email, content) VALUES ($id_question, '$name', '$email', '$content')";
        var_dump($query);
        $this->db->query($query);

        header('Location: ' . ROOT_URL . '/question/' . $id_question);
    }

    public function edit($data) {
        $id_answer      = $data['id_answer'];
        $id_question    = $data['id_question'];
        $name           = $data['name'];
        $email          = $data['email'];
        $content        = $data['content'];


        $query = "UPDATE answers SET name='$name', email='$email', content='$content' WHERE id_answer = $id_answer";
        $this->db->query($query);

        header('Location: ' . ROOT_URL . '/question/' . $id_question);
    }

    public function delete($id) {
        $query = "DELETE FROM answers WHERE id_answer = $id";
        var_dump($query);
        $this->db->query($query);

        header('Location: ' . ROOT_URL);   
    }
}