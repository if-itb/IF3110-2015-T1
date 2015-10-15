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
    <form id="form" method="POST" action="?action=submit" onsubmit="return validateForm()" >
      <table>
      <input name="id" type="hidden" value="<?=$question["id"]?>"/>
      <input class="form-text" type="text" name="name" placeholder="Name" value="<?=$question["name"]?>" maxlength="127"/>
      <input class="form-text" type="text" name="email" placeholder="Email" value="<?=$question["email"]?>" maxlength="127"/>
      <input class="form-text" type="text" name="topic" placeholder="Question Topic" value="<?=$question["topic"]?>" maxlength="255" />
      <textarea class="form-box" rows="10" name="content" placeholder="Content"><?=$question["content"]?></textarea>
      <input type="submit" class="submit-button" value="Post"/>
      </table>
    </form>
    <script type="text/javascript" src="assets/js/validation.js"></script>
  </body>
</html>