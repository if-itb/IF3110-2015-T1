<!DOCTYPE html>

<head>
  <title>Simple StackExchange</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="StackExchange">
    <center>
      <h1>Simple StackExchange</h1><br><br>
    </center>

    <div class="question-form">
      <h2>What's your question?</h2><hr><br>
      <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "stackexchange";
          $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
          @mysql_select_db('stackexchange') or die(mysql_error());
          $question_id = $_GET["id"];
          $query = "SELECT * FROM question WHERE (ID = $question_id)";
          $result = mysql_query($query);
          $name = mysql_result($result, 0, "Nama");
          $email = mysql_result($result, 0, "Email");
          $topic = mysql_result($result, 0, "Topic");
          $content = mysql_result($result, 0, "Content");
      ?>
      <center>
        <form class="question-form"  action="update.php?id=<?= $question_id ?>" method="POST">
          <input type="text" value="<?= $name; ?>" name="Name"><br>
          <input type="text" value="<?= $email; ?>" name="Email"><br>
          <input type="text" value="<?= $topic; ?>" name="Question-topic"><br>
          <textarea type="text" name="Content"><?= $content; ?></textarea>
          <button type="submit" value="Submit">Post</button>
        </form>
      </center>
    </div>
    <?php mysql_close(); ?>
  </div>
</body>

</html>