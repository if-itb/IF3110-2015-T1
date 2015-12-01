<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) -->
<!-- File: ask-question.php  -->

<!DOCTYPE html>
<html>
  <head>
    <title>Ask Question</title>
    <meta charset="utf-8"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  </head>
  <body>
     <?php
      // Create connection to database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "simple_stackexchange";
      $connection = new mysqli($servername, $username, $password, $dbname);
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      if (isset($_GET["id_question"]) && !empty($_GET["id_question"])) {
        // Edit question. Fetch question with specified question ID
        $id_question = $_GET["id_question"];
        $query = "SELECT id_question, topic, content, question.id_user, name, email FROM question, user WHERE question.id_user = user.id_user AND id_question = $id_question";
        $question = $connection->query($query);
        if ($question->num_rows > 0) {
          $question = $question->fetch_assoc();
          $id_user = $question["id_user"];
          $name = $question["name"];
          $email = $question["email"];
          $id_question = $question["id_question"];
          $topic = $question["topic"];
          $content = str_replace("<br>", "\n", $question["content"]);
        }
      } else {
        // New question
        $name = $email = $topic = $content = "";
        $id_question = "unknown";
        $id_user = "unknown";
      }
    ?>

    <!-- Title -->
    <div class="title">
      <a href="index.php">
        Simple StackExchange
      </a>
    </div>

    <!-- Question Form -->
    <div class="content">
      <div class="subtitle">
        What's your question?
      </div>
      <form class="right" id="question-form" action="question-detail.php?id_question=<?php echo $id_question ?>&id_user=<?php echo $id_user ?>" method="post" onsubmit="return answerFormValidation()">
        <input class="full-length" id="question-name" name="question-name" type="text" placeholder="Name" value="<?php echo $name ?>">
        <input class="full-length" id="question-email" name="question-email" type="text" placeholder="Email" value="<?php echo $email ?>">
        <input class="full-length" id="question-topic" name="question-topic" type="text" placeholder="Question Topic" value="<?php echo $topic ?>">
        <textarea class="full-length" id="question-content" name="question-content" placeholder="Content" rows="10" cols="50"><?php echo $content ?></textarea>
        <input class="button" name="question-submit" type="submit" value="Post">
      </form>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
  </body>
</html>
