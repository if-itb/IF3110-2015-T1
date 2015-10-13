<?php
  echo "index.php<br>";
  define("HOST_DB", "localhost");
  define("USERNAME_DB", "root");
  define("PASSWORD_DB", "");
  define("NAME_DB", "stack_exchange");

  require_once("model/database.php");
  if(isset($_GET["action"])) {
    $action = $_GET["action"];
  }
  else {
    $action = "default";
  }
  require_once("router.php");
?>