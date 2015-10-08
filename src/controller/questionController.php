<?php

require_once '../model/question.php';
  
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $name = $_POST["authorName"];
  $email = $_POST["authorEmail"];
  $topic = $_POST["topic"];
  $content = $_POST["content"];
  $questionModel = new Question();
  if($id == -1) {
    echo "ADDING";
    $questionModel->add($name, $email, $topic, $content);
  } else {
    echo "EDIT";
    $questionModel->edit($id, $name, $email, $topic, $content);
  }
}

header("Location: /view/index.php");
exit();

?>