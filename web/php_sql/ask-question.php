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
      Simple StackExchange
    </div>

    <!-- Question Form -->
    <div class="content">
      <div class="subtitle">
        What's your question?
      </div>
      <form class="right" id="question-form" action="question-detail.php" method="post" onsubmit="return formValidation()">
        <input class="full-length" id="name" name="name" type="text" placeholder="Name">
        <input class="full-length" id="email" name="email" type="text" placeholder="Email">
        <input class="full-length" id="question-topic" name="question-topic" type="text" placeholder="Question Topic">
        <textarea class="full-length" id="content" name="content" placeholder="Content" rows="10" cols="50"></textarea>
        <input class="button" type="submit" value="Post">
      </form>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
  </body>
</html>
