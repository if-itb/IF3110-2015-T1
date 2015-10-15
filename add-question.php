<!DOCTYPE html>
<html>
<head>

  <?php
    require("connect_mysql.php");
  ?>

  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Simple StackExchange - Add Question</title>
</head>

<body>
  <div class="title">
    <h1>Simple StackExchange</h1>
  </div>

  <h2>What's your question?</h2>
  <hr>

  <div class="form">
    <form method="post" action="insert-db.php">
      <input type="text" name="name" placeholder="Name">
      <input type="text" name="email" placeholder="Email">
      <input type="text" name="topic" placeholder="Question Topic">
      <textarea type="text" name="content" placeholder="Content"> </textarea>
      <input type="submit" value="Post">
    </form>
  </div>

</body>
</html>
