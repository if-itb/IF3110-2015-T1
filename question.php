<!DOCTYPE html>
<html>
<head>
  <title>Simple StackExchange</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <?php require("backend/question-answer.php"); ?>
  <script src="js/ajax.js"></script>
</head>

<body>
  <h1>Simple StackExchange</h1>

  <h2><?php echo $question['topic']; ?></h2>
  <hr>
  <div class="item">
      <table class="vote">
        <tr> <td align="center" valign="middle"> <a href="javascript:upvoteQuestion(<?php echo $question['id'];?>)"><span class="big">&#708;</span></a></td> </tr>
        <tr> <td align="center" valign="middle"> <span id="votes"><?php echo $question['votes']; ?></span></td> </tr>
        <tr> <td align="center" valign="middle"> <a href="javascript:downvoteQuestion(<?php echo $question['id'];?>)"><span class="big">&#709;</span></a></td> </tr>
      </table>
      <p class="content"><?php echo $question['content']; ?></p>
      <p class="pull-right"><b>asked by <?php echo $question['name']; ?> at <?php echo $question['created_at']; ?>| <a href="edit-question.php?id=<?php echo $question['id']; ?>" class="orange">edit</a> | <a href="backend/delete-question.php?id=<?php echo $question['id']; ?>" class="red">delete</a></b></p>
  </div>

  <br>

  <h2 id="count"><?php echo 0; ?> Answer</h2>
  <hr>
  <?php while($answer = mysqli_fetch_array($result_answer)) { ?>
      <div class="item">
        <table class="vote">
          <tr> <td align="center" valign="middle"> <a href="javascript:upvoteAnswer(<?php echo $answer['id'];?>)"><span class="big">&#708;</span></a></td> </tr>
          <tr> <td align="center" valign="middle"> <span id="vote<?php echo $answer['id'] ?>"><?php echo $answer['votes']; ?></span></td> </tr>
          <tr> <td align="center" valign="middle"> <a href="javascript:downvoteAnswer(<?php echo $answer['id'];?>)"><span class="big">&#709;</span></a></td> </tr>
        </table>
        <p class="content"><?php echo $answer['content']; ?></p>
        <p class="pull-right"><b>asked by <?php echo $answer['name']; ?> at <?php echo $answer['created_at']; ?></b></p>
      </div>
      <hr>
  <?php } ?>
  <div id="ajax_answer"></div>

  <h2> Your Answer </h2> 
  <form method="post">
    <input type="text" name="name" id="name" placeholder="Name"> <br>
    <input type="text" name="email" id="email" placeholder="Email"> <br>
    <textarea type="text" name="content" id="content" placeholder="Content"></textarea> <br>
    <input type="button" value="Post" name="submit" onclick="postAnswer(<?php echo $question['id'];?>)"> <br>
  </form>
  
</body>
</html>
