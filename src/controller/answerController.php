<?php

require_once '../model/answer.php';

$id = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $name = $_POST["authorName"];
  $email = $_POST["authorEmail"];
  $content = $_POST["content"];
  $answerModel = new Answer();
  $answerModel->add($id, $name, $email, $content);
}

header("Location: /view/question.php?id=$id");
exit();

?>