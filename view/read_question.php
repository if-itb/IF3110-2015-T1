<?php
  echo "view/read_question.php<br>";
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <title>Question | StackExchange</title>
  </head>
  <body>
      <h1 id="title"><a href="\">Simple StackExchange</a></h1>
      <h2><?=$question["topic"]?></h2>

      <hr class="line">
      <div class="item">
        <div class="counter">
          <div class="arrow"> 
            <img src="assets/img/up.png" alt="Vote up" class="arrow">
          </div>
          <p class="vote"><?=$question["vote"]?></p>
          <div class="arrow"> 
            <img src="assets/img/down.png" alt="Vote down" class="arrow">
          </div>
        </div>
          <p class="desc"><?=$question["content"]?></p>
        <div class="footer">
          <p>
            asked by 
            <span class="name"><?=$question["name"]?> &lt;<?=$question["email"]?>&gt;</span>
            at <?=$question["time"]?> | 
            <a class="edit" href="?action=edit&amp;id=<?=$question["id"]?>">edit</a> | 
            <span class="delete">delete</span> 
          </p>
        </div>
      </div>
      <h2><?=count($answers)?> Answers</h2>
      <hr class="line">

      <?php foreach($answers as $answer) { ?>
        <div class="item">
          <div class="counter">
            <div class="arrow"> 
              <img src="assets/img/up.png" alt="Vote up" class="arrow">
            </div>
            <p class="vote"><?= $answer["vote"] ?></p>
            <div class="arrow"> 
              <img src="assets/img/down.png" alt="Vote down" class="arrow">
            </div>
          </div>
            <p class="desc">
              <?= $answer["content"] ?>
            </p>
          <div class="footer">
            <p>
              answered by 
              <span class="name"><?= $answer["name"] ?> &lt;<?= $answer["email"] ?>&gt;</span>
              at <?= $answer["time"] ?>
            </p>
          </div>
        </div>
      <?php } ?>
      <hr class="line">
      <h2>Your Answer</h2>
      <form id="form">
        <table>
        <input class="form-text" type="text" name="name" placeholder="Name"/>
        <input class="form-text" type="email" name="email" placeholder="Email"/>
        <textarea class="form-box" rows="10" name="content" placeholder="Content"></textarea>
        <input type="submit" class="submit-button" value="Post">
        </table>
      </form>
  </body>
</html>