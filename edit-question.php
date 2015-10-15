<!DOCTYPE html>
<html>
<head>

  <?php
    require("connect_mysql.php");
  ?>

  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Simple StackExchange - Edit Question</title>
</head>

<body>
  <div class="title">
    <h1>Simple StackExchange</h1>
  </div>

  <h2>What's your question?</h2>
  <hr>

  <div class="form">
    <form method="post" action="update-db.php">
    <?php
      $id = $_GET['id'];
      $result = mysql_query("SELECT * FROM questions WHERE id=$id");
      while($row = mysql_fetch_array($result)) 
      {
        echo '<input type="text" name="name" placeholder="Name" value='.$row["name"].'>';
        echo '<input type="text" name="email" placeholder="Email" value='.$row["email"].'>';
        echo '<input type="text" name="topic" placeholder="Question Topic" value='.$row["topic"].'>';
        echo '<textarea type="text" name="content" placeholder="Content">' .$row["content"]. '</textarea>';
        echo '<input type="hidden" name="id" value='.$row["id"].'>';
        echo '<input type="submit" value="Post">';
      }
    ?>
    </form>
  </div>

</body>
</html>
  