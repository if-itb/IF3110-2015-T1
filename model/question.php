<?php
  class Question {
    private $database = NULL;
    private function __construct() {
      $database = Database::getInstance();
    }
    public function getAll() {
      $query = $database->prepare("SELECT * FROM question ORDER BY time DESC");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      return $query->fetchAll();
    }
    public function countAnswer($id) {
      $query = $database->prepare("SELECT * FROM answer WHERE id=$id");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      $result = $query->fetchAll();
      return count($result);
    }
    public function get($id) {
      $query = $database->prepare("SELECT * FROM question WHERE id=$id");
      $query->execute();
      $result = $query->setFetchMode(PDO::FETCH_ASSOC);
      return $query->fetchAll();
    }
    public function add($name, $email, $topic, $content) {
      $database->exec("INSERT INTO question(name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')");
    }
    public function edit($id, $name, $email, $topic, $content) {
      $database->exec("UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id=$id");
    }
    public function remove($id) {
      $database->exec("DELETE FROM question WHERE id=$id");
    }
  }
?>