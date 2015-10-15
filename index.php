<?php
  require_once("model/database.php");
  if(isset($_GET["action"])) {
    $action = $_GET["action"];
  }
  else {
    $action = "default";
  }
  require_once("router.php");
?>