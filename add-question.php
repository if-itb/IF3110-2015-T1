<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Simple StackExchange - Add Question</title>
</head>

<body>
  <h1>Simple StackExchange</h1>

  <h2>What's your question?</h2>
  <hr>

  <form method="post" action="backend/insert-db.php">
    <input type="text" name="name" placeholder="Name"> </br>
    <input type="text" name="email" placeholder="Email"> </br>
    <input type="text" name="topic" placeholder="Question Topic"> </br>
    <textarea type="text" name="content" placeholder="Content"></textarea> </br>
    <input type="submit" value="Post">
  </form>

</body>
</html>
