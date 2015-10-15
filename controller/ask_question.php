<?php
  $question["id"] = -1;
  $question["name"] = "";
  $question["email"] = "";
  $question["topic"] = "";
  $question["content"] = "";
  if(isset($_GET["id"])) {
    require_once("model/question.php");
    $q_model = new Question();
    $result = $q_model->get($_GET["id"]);
    if(isset($result)) {
      $question = $result;
    }
  }
  require_once("view/ask_question.php");
?>