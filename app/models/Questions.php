<?php

class Questions {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;    
    }

    public function get($id) {
        $query = "SELECT * FROM questions WHERE id_question = {$id}";
        
        if ($question = $this->db->query($query)) {
            return $question->fetch(PDO::FETCH_OBJ);
        }
    }

    public function getAll() {
        $query = "SELECT * FROM questions ORDER BY id_question DESC";
        
        if($questions = $this->db->query($query)) {
            return $questions->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function add($data) {
        $name       = $data['name'];
        $email      = $data['email'];
        $topic      = $data['topic'];
        $content    = $data['content'];

        $query = "INSERT INTO questions (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
        $this->db->query($query);

        header('Location: ' . ROOT_URL);
    }

    public function edit($data) {
        $id_question    = $data['id_question'];
        $name           = $data['name'];
        $email          = $data['email'];
        $topic          = $data['topic'];
        $content        = $data['content'];


        $query = "UPDATE questions SET name='$name', email='$email', topic='$topic', content='$content' WHERE id_question = $id_question";
        $this->db->query($query);

        header('Location: ' . ROOT_URL . '/question/' . $id_question);
    }

    public function delete($id_question) {
        $query = "DELETE FROM questions WHERE id_question = $id_question";
        var_dump($query);
        $this->db->query($query);

        header('Location: ' . ROOT_URL);   
    }
}