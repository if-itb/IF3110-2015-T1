<!DOCTYPE html>
<html>
<head>
  <?php require("backend/question-one.php"); ?>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Simple StackExchange - Edit Question</title>
</head>

<body>
  <h1>Simple StackExchange</h1>

  <h2>What's your question?</h2>
  <hr>

  <div class="form">
    <form method="post" action="backend/update-db.php">
      <input type="text" name="name" placeholder="Name" value="<?php echo $question['name']; ?>"> </br>
      <input type="text" name="email" placeholder="Email" value="<?php echo $question['email']; ?>"> </br>
      <input type="text" name="topic" placeholder="Question Topic" value="<?php echo $question['topic']; ?>"> </br>
      <textarea type="text" name="content" placeholder="Content"> <?php echo $question['content']; ?></textarea> </br>
      <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
      <input type="submit" value="Post">
    </form>
  </div>

</body>
</html>
