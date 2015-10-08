<?php

  require_once("./controller.php");

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $question = array();
    $question['name'] = $_POST['name'];
    $question['email'] = $_POST['email'];
    $question['topic'] = $_POST['topic'];
    $question['content'] = $_POST['content'];
    postQuestion($question);

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">

    <script type="text/javascript" src="script.js"></script>

    <title>Simple StackExchange</title>

</head>
<body>
<div id = "container">
    <div id="header">
      <p id="logo">Simple StackExchange</p>
    </div>

    <div id= "content">
      <p class="content_title">What's your question?</p>
    
      <!--javascript Form Validation -->
      <form name="question_form" id="question" action="" onsubmit="return validateQuestionForm()" method="post"  > 
         <input type="text" name="name" placeholder="Name">
         <input type="text" name="email" placeholder="Email" >
         <input type="text" name="topic" placeholder="Question Topic">
         <textarea name="content" placeholder="Content" rows="5" cols="40"></textarea>
         <input type="submit" class="submitButton" value="Post"> 
      </form>
    </div>

    <div id="footer">
    </div>
    
</div>
</body>

</html>



