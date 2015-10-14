<?php
  echo "router.php<br>";
  function go($action) {
    switch ($action) {
      case "default":
        require_once("controller/home.php");
        break;
      case "read":
        require_once("controller/read_question.php");
        break;
      case "edit":
      case "ask":
        require_once("controller/ask_question.php");
        break;
      case "remove":
        require_once("controller/remove_question.php");
        break;
      case "submit":
        require_once("controller/submit_question.php");
        break;
      case "answer":
        require_once("controller/answer_question.php");
      default :
        require_once("view/error.php");
    }
  }
  go($action);
?>