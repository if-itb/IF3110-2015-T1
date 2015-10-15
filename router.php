<?php
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
        break;
      case "vote_question":
        require_once("controller/vote_question.php");
        break;
      case "vote_answer":
        require_once("controller/vote_answer.php");
        break;
      default :
        require_once("view/error.php");
    }
  }
  go($action);
?>