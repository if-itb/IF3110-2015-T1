<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <title>Question | StackExchange</title>
  </head>
  <body>
    <h1 id="title"><a href="\">Simple StackExchange</a></h1>
    <h2><?=$question["topic"]?></h2>

    <hr class="line">
    <div class="item">
      <div class="counter">
        <div class="arrow"> 
          <img src="assets/img/up.png" alt="Vote up" class="arrow" onclick="javascript:changeQuestionVote(<?=$question["id"]?>,1)">
        </div>
        <p id = "vote" class="vote"><?=$question["vote"]?></p>
        <div class="arrow"> 
          <img src="assets/img/down.png" alt="Vote down" class="arrow" onclick="changeQuestionVote(<?=$question["id"]?>,-1)">
        </div>
      </div>
        <p class="desc"><?=$question["content"]?></p>
      <div class="footer">
        <p>
          asked by 
          <a href="mailto:<?=$question["email"]?>" class="name"><?=$question["name"]?> &lt;<?=$question["email"]?>&gt;</a>
          at <?=$question["time"]?> | 
          <a class="edit" href="?action=edit&amp;id=<?=$question["id"]?>">edit</a> | 
          <a class="delete" href="#" onclick="removeQuestion(<?=$question["id"]?>)">delete</a>
        </p>
      </div>
    </div>
    <h2><?=count($answers)?> Answers</h2>
    <hr class="line">

    <?php foreach($answers as $answer) : ?>
      <div class="item">
        <div class="counter">
          <div class="arrow"> 
            <img src="assets/img/up.png" alt="Vote up" class="arrow" onclick="changeAnswerVote(<?=$question["id"]?>,<?=$answer["id"]?>,1)">
          </div>
          <p id="vote-<?=$answer["id"]?>"class="vote"><?= $answer["vote"] ?></p>
          <div class="arrow"> 
            <img src="assets/img/down.png" alt="Vote down" class="arrow"onclick="changeAnswerVote(<?=$question["id"]?>,<?=$answer["id"]?>,-1)">
          </div>
        </div>
          <p class="desc">
            <?= $answer["content"] ?>
          </p>
        <div class="footer">
          <p>
            answered by 
            <a href="mailto:<?=$answer["email"]?>" class="name"><?= $answer["name"] ?> &lt;<?= $answer["email"] ?>&gt;</a>
            at <?= $answer["time"] ?>
          </p>
        </div>
      </div>
    <hr class="line">
    <?php endforeach ?>
    <h2>Your Answer</h2>
    <form id="form" method="POST" action="?action=answer" onsubmit="return validateForm()">
      <table>
      <input name="id" type="hidden" value="<?=$question["id"]?>"/>
      <input class="form-text" type="text" name="name" placeholder="Name" maxlength="127" />
      <input class="form-text" type="text" name="email" placeholder="Email" maxlength="127" />
      <textarea class="form-box" rows="10" name="content" placeholder="Content"></textarea>
      <input type="submit" class="submit-button" value="Post"/>
      </table>
    </form>
    <script type="text/javascript" src="assets/js/validation.js"></script>
    <script type="text/javascript" src="assets/js/vote.js"></script>
  </body>
</html>