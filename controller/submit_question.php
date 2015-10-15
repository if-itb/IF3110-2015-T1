<?php
  require_once("model/question.php");
  $q_model = new Question();
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $topic = $_POST["topic"];
  $content = $_POST["content"];
  if(isset($id) && isset($name) && isset($email) && isset($topic) && isset($content)) {
    if($id >= 0)
      $q_model->edit($id, $name, $email, $topic, $content);
    else
      $q_model->add($name, $email, $topic, $content);
  }
  header("Location: /");
  die();
?>