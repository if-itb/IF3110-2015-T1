<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) -->
<!-- File: ask-question.html  -->

<!DOCTYPE html>
<html>
  <head>
    <title>Ask Question</title>
    <meta charset="utf-8"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  </head>
  <body>
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
      <form class="right" id="question-form" action="question-detail.php?id_question=unknown" method="post" onsubmit="return formValidation()">
        <input class="full-length" id="question-name" name="question-name" type="text" placeholder="Name">
        <input class="full-length" id="question-email" name="question-email" type="text" placeholder="Email">
        <input class="full-length" id="question-topic" name="question-topic" type="text" placeholder="Question Topic">
        <textarea class="full-length" id="question-content" name="question-content" placeholder="Content" rows="10" cols="50"></textarea>
        <input class="button" name="question-submit" type="submit" value="Post">
      </form>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
  </body>
</html>
