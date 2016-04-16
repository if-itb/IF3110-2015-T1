<?php

require_once 'model.php';

class Question extends Model {
  private function getAnswerCount($id) {
    $sql = "SELECT * FROM answer WHERE id_question=$id";
    $result = $this->getResultQuery($sql);
    return count($result);
  }

  public function getAll() {
    $sql = "SELECT * FROM question ORDER BY id_question DESC";
    $result = $this->getResultQuery($sql);
    foreach($result as &$item) {
      $item["answer"] = $this->getAnswerCount($item["id_question"]);
    } 
    return $result;
  }

  public function getSearch($str) {
    $sql = "SELECT * from question WHERE topic LIKE '%$str%' UNION
            SELECT * from question WHERE content LIKE '%$str%'";
    $result = $this->getResultQuery($sql);
    foreach($result as &$item) {
      $item["answer"] = $this->getAnswerCount($item["id_question"]);
    }
    return $result;
  }

  public function get($id) {
    $sql = "SELECT * FROM question WHERE id_question=$id";
    $result = $this->getResultQuery($sql);
    foreach($result as &$item) {
      $item["answer"] = $this->getAnswerCount($item["id_question"]);
    } 
    return $result;
  }

  public function add($name, $email, $topic, $content) {
    $sql = "INSERT INTO question(name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
    $this->executeQuery($sql);
  }

  public function edit($id, $name, $email, $topic, $content) {
    $sql = "UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id_question=$id";
    $this->executeQuery($sql);
  }

  public function delete($id) {
    $sql = "DELETE FROM question WHERE id_question=$id";
    $this->executeQuery($sql);
  }

  public function getVote($id) {
    $sql = "SELECT vote FROM question WHERE id_question=$id";
    $num = $this->getResultQuery($sql)[0]["vote"];
    return $num;
  }

  public function upvote($id) {
    $num = $this->getVote($id);
    $num++;
    $sql = "UPDATE question SET vote=$num WHERE id_question=$id";
    $this->executeQuery($sql);
  }

  public function downvote($id) {
    $num = $this->getVote($id);
    $num--;
    $sql = "UPDATE question SET vote=$num WHERE id_question=$id";
    $this->executeQuery($sql);
  }
}

?> 