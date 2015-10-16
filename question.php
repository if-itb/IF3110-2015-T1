<!DOCTYPE html>
<html>
<head>
  <?php require("connect-mysql.php"); ?>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Simple StackExchange</title>
</head>

<body>
  <div class="title">
    <h1>Simple StackExchange</h1>
  </div>

  <?php
    $id = $_GET['id'];
    $result = mysql_query("SELECT * FROM questions WHERE id=$id"); 
    $question = mysql_fetch_array($result)
  ?>

  <h2><?php $question['topic'] ?></h2>
  <hr>
  <div class='item'>
    <?php
      echo "<p class='content'>" . $question['content'] . "</p>";
      echo "<p class='pull-right'><b>asked by <span>" . $question['name'] . "</span></b></p>";
    ?>
  </div>

  <?php
    $result = mysql_query("SELECT * FROM answers WHERE question_id=$id"); 
    $num_rows = mysql_num_rows($result);
  ?>

  <h2><?php $num_rows ?> Answer</h2>
  <hr>
  <?php
    while($answer = mysql_fetch_array($result))
    {
      echo "<div class='item'>";
      echo "<p class='content'>" . $answer['topic'] . "</p>";
      echo "<p class='pull-right'><b>asked by <span>" . $question['name'] . "</span> | <a href='edit-question.php?id=" . $question['id'] . "' class='orange'>edit</a> | <a href='delete-question.php?id=" . $question['id'] . "' class='red' >delete</a></b></p>";
      echo "</div>";
      echo "<hr>";
    }
  ?>
</body>
</html>
