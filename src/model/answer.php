<?php

require_once 'model.php';

class Answer extends Model {
  // take answer from certain question ID
  public function get($id) {
    $sql = "SELECT * FROM answer WHERE id_question=$id ORDER BY vote DESC";
    return $this->getResultQuery($sql);
  }
  public function add($id, $name, $email, $content) {
    $sql = "INSERT INTO answer(id_question, name, email, content) VALUES ($id, '$name', '$email', '$content')";
    $this->executeQuery($sql);
  }
}

?>