<!DOCTYPE html>
<html>
  <head>
    <title>Ask Question | Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="icon" type="image/png" href="/assets/icon.png">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">OVERFLOW48</h1>
      <br/>
      <h2>What's your question?</h2>
      <?php
        require_once '../conf.php';
        require_once '../model/question.php';
        $questionModel = new Question();
        $q = [];
        if(($id = $_GET["id"]) !== null) {
          $q = $questionModel->get($id);
        }
      ?>
      <hr class="line">
      <form action="/controller/ask.php" action="POST">
        <input placeholder="Name" class="form" type="text" name="authorName" value="<?= $q["content"] ?>">
        <input placeholder="Email" class="form" type="text" name="authorEmail" value="<?= $q["email"] ?>">
        <input placeholder="Question Topic" class="form" type="text" name="topic" value="<?= $q["topic"] ?>">
        <textarea placeholder="Content" class="box" name="content" value="<?= $q["content"] ?>"></textarea>
        <div class="text-right">
            <button class="button" class="text-right" type="submit">Post</button>
        </div>
      </form>
    </div>
  </body>
</html>