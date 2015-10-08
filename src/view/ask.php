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
      <hr class="line">
      <form action="/controller/ask.php" action="POST">
        <input placeholder="Name" class="form" type="text" name="authorName">
        <input placeholder="Email" class="form" type="text" name="authorEmail">
        <input placeholder="Question Topic" class="form" type="text" name="topic">
        <textarea placeholder="Content" class="box" name="content"></textarea>
        <div class="text-right">
            <button class="button" class="text-right" type="submit">Post</button>
        </div>
      </form>
    </div>
  </body>
</html>