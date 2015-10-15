<?php
  require_once("model/answer.php");
  $q_model = new Answer();
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $content = $_POST["content"];
  if(isset($id) && isset($name) && isset($email) && isset($content)) {
    $q_model->add($id, $name, $email, $content);
  }
  header("Location: ?action=read&id=$id");
  exit();
?>