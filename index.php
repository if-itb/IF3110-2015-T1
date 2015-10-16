<!DOCTYPE HTML>
<html>
<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/style/master.css" >
</head>
<body>
  <?php
    require 'query.php';
  ?>
  <?php
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $question['name']=test_input($_POST['name']);
      $question['email']=test_input($_POST['email']);
      $question['topic']=test_input($_POST['topic']);
      $question['content']=test_input($_POST['content']);
      $question['q_id']=$_POST['q_id'];
      updateQuestion($question);
    }

    $tabQuestion = getAllQuestions();
    $nQuestion = mysqli_num_rows($tabQuestion);
  ?>
<div class="view">
  <h1>Simple Stack Exchange</h1><br>
  <form id="search">
    <input type="text" name="search">
    <input type="submit" value="Search">
  </form>
  <div class="ask-here">
    <div>Cannot find what are you looking for?</div>
    <div><a href="ask.php" >Ask here</a></div>
  </div>

  <p id='head'>Recently Asked Question</p>
  <hr>
  <?php
    if($nQuestion==0) {
      echo "<div>No Question</div>";
    } else{
      while($question= mysqli_fetch_assoc($tabQuestion)){
  ?>
          <div class="title"><a href="question.php?q_id=<?php echo $question['q_id']?>"><?php echo $question['topic']; ?></a></div>
          <div class="row">
          <div class="vote-col">
            <div><?php echo $question['vote']; ?></div><br>
            <div>Votes</div>
          </div>
          <div class="answer-col">
            <div><?php echo countAnswer($question['q_id']); ?></div><br>
            <div>Answer</div>
          </div>
          <div class="content-col">
            <p> <?php echo substr($question['content'],0, 270); ?> </p>
          </div>
          <br>
          <div class="other">
            <div>asked by</div>
            <div class="name"><?php echo $question['name']; ?></div><div>&nbsp|</div>
            <div class="edit"><a href="ask.php?q_id=<?php echo $question['q_id'].'&address=home';?>">edit</a></div><div>&nbsp|</div>
            <div class="delete"><a href="delete.php?q_id=<?php echo $question['q_id'];?>" onclick="return confirmDeletion()">delete</a></div>
          </div>
          <br>
        </div>
      <hr>
  <?php
      }
    }
  ?>
  </div>

  <script src="/script/master.js"></script>
  <?php
    mysqli_close($conn);
   ?>
  </body>
 </html>
