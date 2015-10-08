<?php

require_once 'model.php';

class Question extends Model {
  private function getAnswerCount($id) {
    $sql = "SELECT * FROM answer WHERE id_question=".$id;
    $result = $this->getResultQuery($sql);
    return count($result);
  }

  public function getAll() {
    $sql = "SELECT * FROM question";
    $result = $this->getResultQuery($sql);
    foreach($result as &$item) {
      $item["answer"] = $this->getAnswerCount($item["id_question"]);
    } 
    return $result;
  }
  public function get($id) {
    $sql = "SELECT * FROM question WHERE id_question=".$id;
    $item = $this->getResultQuery($sql);
    $item["answer"] = $this->getAnswerCount($item["id_question"]); 
    return $item;
  }
  public function add() {

  }
  public function edit($id) {

  }
  public function delete() {

  }
}

?> 