<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Edit Question</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="ask.css">
</head>
 <body>
   <?php
    include 'query.php';
   ?>
   <?php
    $name=$email=$topic=$content=$q_id='';
    $address='index.php';
    if($_GET){
      $q_id=$_GET['q_id'];
      $question=getQuestion($q_id);
      $name=$question['name'];
      $email=$question['email'];
      $topic=$question['topic'];
      $content=$question['content'];
      $q_id=$question['q_id'];
      if($_GET['address']=='question'){
        $address='question.php?q_id='.$_GET['q_id'];
      }
    }
 ?>
   <h1>Simple Stack Exchange</h1>
   <br>
   <div id=form>
     <h2>What's your question?</h2>
     <hr align="left">
     <form name="questionForm" method="post" onsubmit="return validateQuestion()" action=<?php echo $address; ?> >
       <input type="text" name="name" value="<?php echo $name ?>" placeholder="Name"><span id="nameErr"></span><br>
       <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email"><span id="emailErr"></span><br>
       <input type="text" name="topic" value="<?php echo $topic ?>" placeholder="Question Topic"><span id="topicErr"></span><br>
       <textarea rows="4" cols="50" name="content" placeholder="Content"><?php echo $content ?></textarea><span id="contentErr"></span><br>
       <input type="submit" value="Post">
       <input type="hidden" name="q_id" value="<?php echo $q_id ?>">
       <input type="hidden" name="type" value="question">
     </form>
   </div>

   <script src="/script/master.js"></script>
 </body>
 </html>
