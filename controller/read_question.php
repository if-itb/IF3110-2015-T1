<?php
  echo "controller/read_question.php<br>";
  require_once("model/question.php");
  require_once("model/answer.php");
  $q_model = new Question();
  $ans_model = new Answer();
  $id = $_GET["id"];
  if(isset($id)) {
    $question = $q_model->get($id);
    if(isset($question)) {
      $answers = $ans_model->getAll($id);
      require_once("view/read_question.php");
    }
    else
      require_once("view/error.php");
  }
  else
    require_once("view/error.php");
?>