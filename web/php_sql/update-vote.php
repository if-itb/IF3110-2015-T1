<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author  : Irene Wiliudarsan (13513002) -->
<!-- File: script.js -->

<?php
  // Create connection to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simple_stackexchange";
  $connection = new mysqli($servername, $username, $password, $dbname);
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  // Update vote number
  $vote_factor = $_GET["vote_factor"];
  if (isset($_GET["id_question"])) {
    $id_question = $_GET["id_question"];
    $query = "SELECT vote_num FROM question WHERE id_question = $id_question";
    $vote_num = $connection->query($query);
    $vote_num = $vote_num->fetch_assoc()["vote_num"];
    $query = "UPDATE question SET vote_num = $vote_num+$vote_factor WHERE id_question = $id_question";
  } else {
    $id_answer = $_GET["id_answer"];
    $query = "SELECT vote_num FROM answer WHERE id_answer = $id_answer";
    $vote_num = $connection->query($query);
    $vote_num = $vote_num->fetch_assoc()["vote_num"];
    $query = "UPDATE answer SET vote_num = $vote_num+$vote_factor WHERE id_answer = $id_answer";
  }
  $isUpdated = $connection->query($query);

  // Get number of votes from databases
  if (isset($_GET["id_question"])) {
    $query = "SELECT vote_num FROM question WHERE id_question = $id_question";
  } else {
    $query = "SELECT vote_num FROM answer WHERE id_answer = $id_answer";
  }
  $vote_num_updated = $connection->query($query);
  $vote_num_updated = $vote_num_updated->fetch_assoc()["vote_num"];
  echo $vote_num_updated;
?>  