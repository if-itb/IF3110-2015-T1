<?php
  echo "controller/ask_question.php<br>";
  $question["id"] = -1;
  $question["name"] = "cuk";
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