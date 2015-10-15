<?php
  require_once("model/answer.php");
  $q_id = $_GET["q_id"];
  $id = $_GET["id"];
  $dvote = $_GET["dvote"];
  $ans_model = new Answer();
  $vote = $ans_model->vote($q_id, $id, $dvote);
  echo $vote;
?>