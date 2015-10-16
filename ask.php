<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Edit Question</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/style/master.css" >
</head>
 <body>
   <?php
    require 'query.php';
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

 <div class="view">
   <h1>Simple Stack Exchange</h1><br>
   <div id=form>
     <h2>What's your question?</h2>
     <hr align="left">
     <form name="questionForm" method="post" onsubmit="return validateQuestion()" action=<?php echo $address; ?> >
       <input type="text" id="name" name="name" value="<?php echo $name ?>" placeholder="Name"><br>
       <input type="text" id="email" name="email" value="<?php echo $email ?>" placeholder="Email"><br>
       <input type="text" id="topic" name="topic" value="<?php echo $topic ?>" placeholder="Question Topic"><br>
       <textarea rows="4" cols="50" id="content" name="content" placeholder="Content"><?php echo $content ?></textarea><br>
       <input type="submit" value="Post">
       <input type="hidden" name="q_id" value="<?php echo $q_id ?>">
       <input type="hidden" name="type" value="question">
     </form>
   </div>
 </div>
   <script src="/script/master.js"></script>
   <?php
     mysqli_close($conn);
    ?>
 </body>
 </html>
