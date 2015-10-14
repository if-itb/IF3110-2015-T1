<?php
  echo "controller/remove_question.php<br>";
  $id = $_GET["id"];
  if(isset($id)) {
    require_once("model/question.php");
    $q_model = new Question();
    $q_model->remove($id);
  }
  header("Location: /");
  die();
?>