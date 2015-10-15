<!DOCTYPE html>
<html>
<head>

  <?php
    require("connect_mysql.php");
  ?>

  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Simple StackExchange</title>
</head>

<body>
  <div class="title">
    <h1>Simple StackExchange</h1>
  </div>

  <div class="center">
    <div class="search">
      <form method="get" action="">
        <input type="search" name="search" placeholder="Search...">
        <input type="submit" value="Search">
      </form>
    </div>
    <p>Cannot find what you are looking for? <a href="add-question.php" class="orange">Ask here</a></p>
  </div>

  <h3>Recently Asked  Question</h3>
  
  <ul>    
    <?php
			$result = mysql_query("SELECT * FROM questions");
			while($question = mysql_fetch_array($result)) 
			{
        if ($question['id'] == 1) echo "<hr>\n";
        
        echo "
        <table class='stats'>
          <tr class='stat-number'>
            <td>" . $question['votes'] . "</td>
            <td>" . $question['answers'] . "</td>
          </tr>
          <tr>
            <td>Votes</td>
            <td>Answers</td>
          </tr>
        </table>
        ";

        echo "<p class='question-topic'><a href='question.php?id='" .$question['id']. ">" . $question['topic'] . "</a></p>\n";
        $detail = substr($question['content'], 0, 60);
        echo "<p class='question-detail'>" . $detail . "...</p>\n";
        echo "<p class='pull-right'><b>asked by <span class='purple'>" . $question['name'] . "</span> | <a href='edit-question.php?id=" . $question['id'] . "' class='orange'>edit</a> | <a href='delete-question.php?id=" . $question['id'] . "' class='red' >delete</a></b></p>\n";
        echo "<hr>\n";
			}
    ?>

  </ul>

</body>
</html>
