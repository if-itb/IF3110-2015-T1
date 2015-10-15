<!DOCTYPE HTML>
<html>
<head>
  <title>Question Topic</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/style/master.css" >
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
    if($_POST['type']=='question') {
      $question['name']=test_input($_POST['name']);
      $question['email']=test_input($_POST['email']);
      $question['topic']=test_input($_POST['topic']);
      $question['content']=test_input($_POST['content']);
      $question['q_id']=$_POST['q_id'];
      updateQuestion($question);
    } else{
      $answer['q_id']=$_GET['q_id'];
      $answer['name']=test_input($_POST['name']);
      $answer['email']=test_input($_POST['email']);
      $answer['content']=test_input($_POST['content']);
      addAnswer($answer);
    }
  }
?>

<?php
  $q_id=$_GET['q_id'];
  $question=getQuestion($q_id);
  $tabAnswer=getAnswers($q_id);
  $nAnswer=mysqli_num_rows($tabAnswer);
?>
<div class="view">
  <h1>Simple Stack Exchange</h1><br>
  <h2><?php echo $question['topic']; ?></h2>
  <hr>
  <div class="row">
    <div class="vote-col-1">
      <div><img src="/assets/up.png" onclick="vote('question', <?php echo $q_id; ?>, 'up')"></div>
      <br>
      <div id="questionVote"><?php echo $question['vote']; ?></div>
      <br>
      <div><img src="/assets/down.png" onclick="vote('question', <?php echo $q_id; ?>, 'down')"></div>
    </div>
    <div class="content-col-1">
      <p><?php echo $question['content']; ?></p>
      <div></div>
    </div>
    <br>
    <div class="other">
      <div>asked by</div>
      <div class="name"><?php echo $question['name']; ?></div>
      <div>at&nbsp</div><div><?php echo $question['date_posted']; ?></div>
      <div>&nbsp|</div>
      <div class="edit"><a href="ask.php?q_id=<?php echo $question['q_id'].'&address=question';?>">edit</a></div><div>&nbsp|</div>
      <div class="delete"><a href="delete.php?q_id=<?php echo $question['q_id'];?>" onclick="return confirmDeletion()">delete</a></div>
    </div>
  </div><br>
  <div class="answer">
  <h3><?php echo countAnswer($q_id); ?></h2>
  <h3>answer</h2>
  </div>
  <hr>
  <?php
    if($nAnswer==0) {
      echo "<div>No Answer</div><hr>";
    } else{
      while($answer=mysqli_fetch_assoc($tabAnswer)){
  ?>
      <div class="row">

        <div class="vote-col-1">
          <div><img src="/assets/up.png" onclick="vote('answer', <?php echo $answer['a_id']; ?>, 'up')"></div>
          <br>
          <div id="answerVote-<?php echo $answer['a_id'];?>"><?php echo $answer['vote']; ?></div>
          <br>
          <div><img src="/assets/down.png" onclick="vote('answer', <?php echo $answer['a_id']; ?>, 'down')"></div>
        </div>

        <div class="content-col-1">
          <p><?php echo $answer['content'];?></p>
        </div>
        <div class="other">
          <div>answered by</div>
          <div class="name"><?php echo $answer['name'];?></div>
          <div>at&nbsp</div><div><?php echo $answer['date_posted'];?></div>
        </div>
      </div>
      <br>
    <hr>
  <?php
      }
    }
  ?>

  <div>
    <h2>Your Answer<h2>
    <form name="answerForm" method="post" onsubmit="return validateAnswer()"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?q_id=".$question['q_id'];?>">
      <input type="text" id="name" name="name" value="" placeholder="Name"><br>
      <input type="text" id="email" name="email" value="" placeholder="Email"><br>
      <textarea rows="4" cols="50" id="content" name="content" placeholder="Content"></textarea><br>
      <input type="submit" value="Post">
      <input type="hidden" name="type" value="answer">
    </form>
  </div>
</div>
<script src="/script/master.js"></script>
</body>
</html>
