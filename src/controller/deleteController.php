<?php

require_once '../model/question.php';
  
$id = $_GET["id"];
$questionModel = new Question();
$questionModel->delete($id);

header("Location: /view/index.php");
exit();

?>