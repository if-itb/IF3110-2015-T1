<?php
  $keyword = $_GET["keyword"];
  require_once("model/question.php");
  $q_model = new Question();
  $questions = $q_model->getSearch($keyword);
  $cnt = count($questions);
  for($i = 0; $i<$cnt; $i++) {
    $questions[$i]["answer"] = $q_model->countAnswer($questions[$i]["id"]);
  }
  require_once("view/home.php");
?>