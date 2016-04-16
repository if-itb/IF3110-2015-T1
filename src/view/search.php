<!DOCTYPE html>
<html>
  <head>
    <title>Search | Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="icon" type="image/png" href="/assets/white-icon.jpg">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center"><a href="/view/index.php">OVERFLOW48</a></h1>
      
      <form id="search" action="/view/search.php" action="GET" onsubmit="return validateSearch()">
        <table>
        <tr>
          <td width="200%"> <input id="q" placeholder="What are you looking for?" type="text" class="form" name="q"></td>
          <td width="20%"> <button class="button" type="submit">Search</button> </td>
        </tr>
        </table>
      </form>

      <p class="text-center">Cannot find what you are looking for? <a href="/view/ask.php" class="link">Ask here.</a></p>

      <?php
        require_once '../conf.php';
        require_once '../model/question.php';
        $q = $_GET["q"];
        $questionModel = new Question();
        $questions = $questionModel->getSearch($q);
        $cnt = count($questions);
      ?>

      <br/> <h3><?=$cnt?> results about '<?=$q?>'</h3>

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
              <p>asked by <?= $q["name"] ?> | <a href="/view/ask.php?id=<?=$q["id_question"]?>" class="link">edit</a> | <a href="#" onclick="confirmDelete(<?=$q["id_question"]?>)" class="link">delete</a></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <script type="text/javascript" src="/assets/js/validation.js"></script>
  </body>
  <footer> <br><br> </footer>
</html>