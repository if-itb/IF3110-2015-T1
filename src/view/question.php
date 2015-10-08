<!DOCTYPE html>
<html>
  <head>
    <title>Question | Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="icon" type="image/png" href="/assets/icon.png">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center"><a href="/view/index.php">OVERFLOW48</a></h1>

      <?php
        require_once '../conf.php';
        require_once '../model/question.php';
        require_once '../model/answer.php';
        $questionModel = new Question();
        $answerModel = new Answer();

        $q = [];
        $id = $_GET["id"];
        $result = $questionModel->get($id);
        foreach($result as $item) {
          $q = $item;
        }

        $answers = $answerModel->get($id);
      ?>

      <br/><h2><a href="/view/question.php?id=<?=$id?>"><?=$q["topic"]?></a></h2>

      <div class="question">
        <hr class="line">
        <div class="item">
          <div class="vote">
            <table width="100%" class="text-center">
              <tr><td><div class="arrow">&#9650;</div></td></tr>
              <tr><td><?=$q["vote"]?></td></tr>
              <tr><td><div class="arrow">&#9660;</div></td></tr>
            </table>
          </div>
          <div class="text-long">
            <p><?=$q["content"]?></p>
          </div>
          <div class="text-right">
            <p>asked by <?=$q["name"]?> at <?=$q["date"]?> | <a href="/view/ask.php?id=<?=$id?>">edit</a> | <a href="/controller/deleteController.php?id=<?=$q["id_question"]?>">delete</a></p>
          </div>
        </div>
      </div>

      <br/> <h2><?=$q["answer"]?> Answers</h2>

      <?php foreach($answers as $a) { ?>
      <div class="question">
        <hr class="line">
        <div class="item">
          <div class="vote">
            <table width="100%" class="text-center">
              <tr><td><div class="arrow">&#9650;</div></td></tr>
              <tr><td><?=$a["vote"]?></td></tr>
              <tr><td><div class="arrow">&#9660;</div></td></tr>
            </table>
          </div>
          <div class="text-long">
            <p><?=$a["content"]?></p>
          </div>
          <div class="text-right">
            <p>answered by <?=$a["name"]?> at <?=$a["date"]?></p>
          </div>
        </div>
      </div>
      <?php } ?>

      <br/><h3>Your Answer</h3>

      <form id="answer" action="/controller/answerController.php" method="POST">
        <input name="id" type="hidden" value=<?=$id?>>
        <input placeholder="Name" class="form" type="text" name="authorName">
        <input placeholder="Email" class="form" type="text" name="authorEmail">
        <textarea placeholder="Content" class="box" name="content"></textarea>
        <div class="text-right">
            <button class="button" class="text-right" type="submit">Post</button>
        </div>
      </form>
    </div>
  </body>
</html>