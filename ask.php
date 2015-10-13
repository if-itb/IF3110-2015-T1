<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Edit Question</title>
  <meta charset="UTF-8">
</head>
 <body>
   <?php
    include 'query.php';
   ?>
   <?php
    $name=$email=$topic=$content=$q_id='';
    if($_GET){
      $q_id=$_GET['q_id'];
      $question=getQuestion($q_id);
      $name=$question['name'];
      $email=$question['email'];
      $topic=$question['topic'];
      $content=$question['content'];
      $q_id=$question['q_id'];
    }
 ?>
   <h1>Simple Stack Exchange</h1>
   <br>
   <div id=form>
     <h2>What's your question?</h2>
     <hr align="left">
     <form method="post" action="index.php">
       <input type="text" name="name" value="<?php echo $name ?>" placeholder="Name"><br>
       <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email"><br>
       <input type="text" name="topic" value="<?php echo $topic ?>" placeholder="Question Topic"><br>
       <textarea rows="4" cols="50" name="content" placeholder="Content"><?php echo $content ?></textarea><br>
       <input type="submit" value="Post">
       <input type="hidden" name="q_id" value="<?php echo $q_id ?>">
     </form>
   </div>
 </body>
 </html>
