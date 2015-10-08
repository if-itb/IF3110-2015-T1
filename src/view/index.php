<!DOCTYPE html>
<html>
  <head>
    <title>Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="icon" type="image/png" href="/assets/white-icon.jpg">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center"><a href="/view/index.php">OVERFLOW48</a></h1>
      
      <form action="/controller/search.php" action="GET">
        <table>
        <tr>
          <td width="200%"> <input placeholder="What are you looking for?" type="text" class="form" name="q"></td>
          <td width="20%"> <button class="button" type="submit">Search</button> </td>
        </tr>
        </table>
      </form>

      <p class="text-center">Cannot find what you are looking for? <a href="/view/ask.php" class="link">Ask here.</a></p>

      <br/> <h3>Recently Asked Questions</h3>

      <?php
        require_once '../conf.php';
        require_once '../model/question.php';
        $questionModel = new Question();
        $questions = $questionModel->getAll();
      ?>

      <?php foreach($questions as $q) { ?>
        <div class="question">
          <hr class="line">
          <div class="item">
            <div class="vote">
              <p class="text-center">
                <a href="/view/question.php?id=<?= $q["id_question"] ?>">
                  <?= $q["vote"] ?>
                </a>
              </p>
              <p class="text-center">
                <a href="/view/question.php?id=<?= $q["id_question"] ?>">
                  Votes
                </a>
              </p>
            </div>
            <div class="answer">
              <p class="text-center">
                <a href="/view/question.php?id=<?= $q["id_question"] ?>">
                  <?= $q["answer"] ?>
                </a>
              </p>
              <p class="text-center">
                <a href="/view/question.php?id=<?= $q["id_question"] ?>">
                  Answers
                </a>
              </p>
            </div>
            <div class="text">
              <p><i><a href="/view/question.php?id=<?= $q["id_question"] ?>"> <?= $q["topic"]?></a></i></p>
            </div>
            <div class="text">
              <p><a href="/view/question.php?id=<?= $q["id_question"] ?>"> <?= $q["content"]?></a></p>
            </div>
            <div class="text-right">
              <p>asked by <?= $q["name"] ?> | <a href="/view/ask.php?id=<?= $q["id_question"] ?>">edit</a> | <a href="/controller/deleteController.php?id=<?=$q["id_question"]?>">delete</a></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </body>
</html>