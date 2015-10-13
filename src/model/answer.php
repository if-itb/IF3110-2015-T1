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
  
  public function getVote($id) {
    $sql = "SELECT vote FROM answer WHERE id_answer=$id";
    $result = $this->getResultQuery($sql);
    $num = $this->getResultQuery($sql)[0]["vote"];
    return $num;
  }

  public function upvote($id) {
    $num = $this->getVote($id);
    $num++;
    $sql = "UPDATE answer SET vote=$num WHERE id_answer=$id";
    $this->executeQuery($sql);
  }

  public function downvote($id) {
    $num = $this->getVote($id);
    $num--;
    $sql = "UPDATE answer SET vote=$num WHERE id_answer=$id";
    $this->executeQuery($sql);
  }

}

?>