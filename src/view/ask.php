<!DOCTYPE html>
<html>
  <head>
    <title>Ask Question | Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="icon" type="image/png" href="/assets/icon.png">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center"><a href="/view/index.php">OVERFLOW48</a></h1>
      <br/>
      <h2>What's your question?</h2>
      <?php
        require_once '../conf.php';
        require_once '../model/question.php';
        $questionModel = new Question();
        $q["name"] = $q["email"] = $q["topic"] = $q["content"] = "";
        $id = -1;
        if(isset($_GET["id"])) {
          $id = $_GET["id"];
          $result = $questionModel->get($id);
          foreach($result as $item) {
            $q = $item;
          }
        }
      ?>
      <hr class="line">
      <form id="ask" action="/controller/questionController.php" method="POST">
        <input name="id" type="hidden" value="<?=$id?>">
        <input placeholder="Name" class="form" type="text" name="authorName" value="<?= $q["name"] ?>">
        <input placeholder="Email" class="form" type="text" name="authorEmail" value="<?= $q["email"] ?>">
        <input placeholder="Question Topic" class="form" type="text" name="topic" value="<?= $q["topic"] ?>">
        <textarea placeholder="Content" class="box" name="content"><?= $q["content"] ?></textarea>
        <div class="text-right">
            <button class="button" class="text-right" type="submit">Post</button>
        </div>
      </form>
    </div>
  </body>
</html>