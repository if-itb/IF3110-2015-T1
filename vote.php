<?php
  function assertion($code,$reason,$statusReason) {
    header("HTTP/1.1 $code $statusReason");
    die($reason);
  }
  mysql_connect("localhost", "root", "") or assertion(503,"Failed to connect to MySQL.","Server Error");
  mysql_select_db("db_stackexchange") or assertion(503,"Failed to load database.","Server Error");
  function sign($n) {
    return ($n > 0) - ($n < 0);
  }
  $id = intval($_POST['id']);
  $type = $_POST['isQuestion'] ? "question" : "answer";
  $crement = intval($_POST['n']);
  if(sign($crement) == 1) {
    $query = "update {$type}s set n_upvote=n_upvote+$crement where {$type}_id=$id";
  } else if(sign($crement) == -1) {
    $crement = abs($crement);
    $query = "update {$type}s set n_downvote=n_downvote+$crement where {$type}_id=$id";
  }
  mysql_query($query) or assertion(503, "Failed to update database. ".mysql_error(),"Server Error");
  $hasil = mysql_query("select n_upvote,n_downvote from {$type}s where {$type}_id=$id limit 1");
  $votes = mysql_fetch_row($hasil);
  echo $votes[0] - $votes[1]; 
?>