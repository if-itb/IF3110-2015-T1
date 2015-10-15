<!DOCTYPE HTML>
<html>
<head>
  <title>Question Topic</title>
  <meta charset="UTF-8">
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

<h1>Simple Stack Exchange</h1>
<h2><?php echo $question['topic']; ?></h2>
<br>
<div>
  <img src="/assets/up.png" onclick="vote('question', <?php echo $q_id; ?>, 'up')">
  <br>
  <div id="questionVote"><?php echo $question['vote']; ?></div>
  <img src="/assets/down.png" onclick="vote('question', <?php echo $q_id; ?>, 'down')">
</div>
<div>
  <p><?php echo $question['content']; ?></p>
</div>

<div>
  <div>asked by</div><div><?php echo $question['name']; ?></div>
  <div>at</div><div><?php echo $question['date_posted']; ?></div>
  <div>|</div>
  <a href="ask.php?q_id=<?php echo $question['q_id'].'&address=question';?>">edit</a><div>|</div>
  <a href="delete.php?q_id=<?php echo $question['q_id'];?>" onclick="return confirmDeletion()">delete</a>
</div>
<h2><?php echo countAnswer($q_id); ?></h2>
<h2>answer</h2>
<hr>
<?php
  if($nAnswer==0) {
    echo "<div>No Answer</div><hr>";
  } else{
    while($answer=mysqli_fetch_assoc($tabAnswer)){
?>
      <div>
        <img src="/assets/up.png" onclick="vote('answer', <?php echo $answer['a_id']; ?>, 'up')">
        <br>
        <div id="answerVote-<?php echo $answer['a_id'];?>"><?php echo $answer['vote']; ?></div>
        <img src="/assets/down.png" onclick="vote('answer', <?php echo $answer['a_id']; ?>, 'down')">
      </div>
      <div>
        <div>
          <div>
            <p><?php echo $answer['content'];?></p>
          </div>
          <div>
            <div>answered by</div><div><?php echo $answer['name'];?></div>
            <div>at</div><div><?php echo $answer['date_posted'];?></div>
          </div>
          <hr>
        </div>
<?php
    }
  }
?>

<div>
  <h2>Your Answer<h2>
  <form name="answerForm" method="post" onsubmit="return validateAnswer()"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?q_id=".$question['q_id'];?>">
    <input type="text" name="name" value="" placeholder="Name"><span id="nameErr"></span><br>
    <input type="text" name="email" value="" placeholder="Email"><span id="emailErr"></span><br>
    <textarea rows="4" cols="50" name="content" placeholder="Content"></textarea><span id="contentErr"></span><br>
    <input type="submit" value="Post">
    <input type="hidden" name="type" value="answer">
  </form>
<div>

<script src="/script/master.js"></script>
</body>
</html>
