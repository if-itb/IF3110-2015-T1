<?php
  if(!empty($_GET["id"]) && !empty($_GET["dvote"])) {
    require_once("model/question.php");
    $id = $_GET["id"];
    $dvote = $_GET["dvote"];
    $q_model = new Question();
    $vote = $q_model->vote($id, $dvote);
    echo $vote;
  }
?>