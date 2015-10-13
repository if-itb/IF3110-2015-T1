<?php
  echo "view/ask_question.php<br>";
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <title>Ask Question | StackExchange</title>
  </head>
  <body>
      <h1 id="title"><a href="/">Simple StackExchange</a></h1>
      <h2>What's your question?</h2>
      <hr class="line">
      <form id="form" method="POST" action="?action=submit" >
        <table>
        <input name="id" type="hidden" value="<?=$question["id"]?>"/>
        <input class="form-text" type="text" name="name" placeholder="Name" value="<?=$question["name"]?>" />
        <input class="form-text" type="email" name="email" placeholder="Email" value="<?=$question["email"]?>" />
        <input class="form-text" type="text" name="topic" placeholder="Question Topic" value="<?=$question["topic"]?>" />
        <textarea class="form-box" rows="10" name="content" placeholder="Content"><?=$question["content"]?></textarea>
        <input type="submit" class="submit-button" value="Post"/>
        </table>
      </form>
  </body>
</html>