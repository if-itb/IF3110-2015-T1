<?php
  class Answer {
    private $database = NULL;
    public function __construct() {
      $this->database = Database::getInstance();
    }
    public function getAll($id) {
      $query = $this->database->prepare("SELECT * FROM answer WHERE question_id=$id ORDER BY vote DESC");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      return $query->fetchAll();
    }
    public function get($q_id, $id) {
      $query = $this->database->prepare("SELECT * FROM answer WHERE question_id=$q_id, id=$id");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      return $query->fetchAll();
    }
    public function add($q_id, $name, $email, $content) {
      $this->database->exec("INSERT INTO answer(question_id, name, email, content) VALUES ($q_id, '$name', '$email', '$content')");
    }
    public function remove($id) {
      $this->database->exec("DELETE FROM answer WHERE question_id=$id");
    }
  }
?>