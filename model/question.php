<?php
  class Question {
    private $database = NULL;
    public function __construct() {
      $this->database = Database::getInstance();
    }
    public function getAll() {
      $query = $this->database->prepare("SELECT * FROM question ORDER BY time DESC");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      return $query->fetchAll();
    }
    public function countAnswer($id) {
      $query = $this->database->prepare("SELECT * FROM answer WHERE question_id=$id");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      $result = $query->fetchAll();
      return count($result);
    }
    public function get($id) {
      $query = $this->database->prepare("SELECT * FROM question WHERE id=$id");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      $result = $query->fetchAll();
      if(count($result) > 0)
        return $result[0];
      else
        return NULL;
    }
    public function add($name, $email, $topic, $content) {
      $sql = "INSERT INTO question(name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
      $this->database->exec($sql);
    }
    public function edit($id, $name, $email, $topic, $content) {
      $this->database->exec("UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id=$id");
    }
    public function remove($id) {
      $this->database->exec("DELETE FROM question WHERE id=$id");
    }
  }
?>