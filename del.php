<?php
  function assertion($code,$reason,$statusReason) {
    header("HTTP/1.1 $code $statusReason");
    die($reason);
  }
  mysql_connect("localhost", "root", "") or assertion(503,"Failed to connect to MySQL.","Server Error");
  mysql_select_db("db_stackexchange") or assertion(503,"Failed to load database.","Server Error");
  $id = $_GET['q_id'];
  $query = "delete from questions where question_id=$id";
  $hasil = mysql_query($query);
  $query = "delete from answers where question_id=$id";
  $hasil = mysql_query($query); 
?>