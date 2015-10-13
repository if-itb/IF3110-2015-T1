<!DOCTYPE HTML>
<html>
<head>
  <title>Homepage</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="master.css" >
</head>
<body>
  <?php
    include 'query.php';
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

    $tabQuestion=getAllRow('question');
    $nQuestion = mysqli_num_rows($tabQuestion);
  ?>

  <h1>Simple Stack Exchange</h1>
  <br>
  <form>
    <input type="text" name="search">
    <input type="submit" value="Search">
  </form>
  <div class="ask-here">
    <div>Cannot find what are you looking for?</div>
    <a href="ask.php">Ask here</a>
  </div>

  <p>Recently Asked Question</p>
  <?php
    if($nQuestion==0) {
      echo "<div>No Question</div>";
    } else{
      while($question= mysqli_fetch_assoc($tabQuestion)){
  ?>
        <div class="question-row">
          <hr>
          <div class="vote-col">
            <div><?php echo $question['vote']; ?></div>
            <div>Votes</div>
          </div>
          <div class="answer-col">
            <div><?php echo countAnswer($question['q_id']); ?></div>
            <div>Answer</div>
          </div>
          <div class="content-col">
            <a href="question.php"><?php echo $question['topic']; ?></a>
            <p> <?php echo $question['content']; ?> </p>
          </div>
          <div class="question-other">
            <div>asked by</div><div>|</div>
            <div><?php echo $question['name']; ?></div><div>|</div>
            <a href="ask.php">edit</a><div></div>
            <a href="delete.php">delete</a>
          </div>
        </div>
  <?php
    }
  }
 ?>
  </body>
 </html>
