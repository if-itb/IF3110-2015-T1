<!DOCTYPE html>

<head>
  <title>Simple StackExchange</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="StackExchange">
    <center>
      <h1>Simple StackExchange</h1><br><br>
    </center>

    <div class="question-form">
      <h2>The question topic goes here</h2><hr><br>
      <div class="question-description">
        <div class="votes">
          <div class="vote-up"></div>
          <div class="count-answer">
            <p>0</p>
          </div>
          <div class="vote-down"></div>
        </div>
        <div class="question-list">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "stackexchange";
            $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
            @mysql_select_db('stackexchange') or die(mysql_error());
            $question_id = $_GET["id"];
            $query = "SELECT * FROM question WHERE (ID = $question_id)";
            $result = mysql_query($query);
            $name = mysql_result($result, 0, "Nama");
            $email = mysql_result($result, 0, "Email");
            $topic = mysql_result($result, 0, "Topic");
            $content = mysql_result($result, 0, "Content");
            $vote = mysql_result($result, 0, "Vote");
            $date_question = mysql_result($result, 0, "Date");
          ?>
          <div class="content">
            <p><?php echo $topic; ?></p>
          </div>
          <br><br><br>
          <div class="asked-description">
            <p>Asked by <span style="color : #502fc8"><?php echo "$email"; ?></span> at <?php echo "$date_question"; ?> |
              <span style="color : #ffcb55"><a href=" /WBD/update-question.php?id=<?= $question_id ?>">edit</a></span> |
              <span style="color : #fd294a">delete</span></p>
          </div>
        </div>
      </div>

      <div class="total-answer">
        <h2>1 Answer</h2>
      </div>
      <hr>
      <div class="answer-description">
        <?php
          $sql = "SELECT * FROM `answer` WHERE (question_ID = $question_id)";
          $result = mysql_query($sql);
          $num = mysql_num_rows($result);

          for($i=0; $i<$num; $i++){
            $question_id = mysql_result($result, $i, "question_ID");
            $name = mysql_result($result, $i, "Nama");
            $email = mysql_result($result, $i, "Email");
            $content = mysql_result($result, $i, "Content");
            $vote = mysql_result($result, $i, "Vote");
            $date = mysql_result($result, $i, "Date");
        ?>
        <div class="votes">
          <div class="vote-up"></div>
          <div class="count-answer">
            <p>0</p>
          </div>
          <div class="vote-down"></div>
        </div>
        <div class="answer-list">
          <p><?php echo "$content"; ?></p>
          <div class="asked-description">
            <p>Answered by <span style="color : #502fc8"><?php echo "$email"; ?></span> at <?php echo "$date"; ?></p>
          </div>
          <hr>
        </div>
        <?php } ?>
      </div>
      <center>
        <form class="answer-form" action="answer-input.php?id=<?= $question_id ?>" method="POST">
          <input type="text" placeholder="  Name" name="Name"><br>
          <input type="text" placeholder="  Email" name="Email"><br>
          <input type="text" placeholder=" Content" name="Content">
          <button type="submit" value="Submit">Post</button>
        </form>
      </center>
    </div>
    <?php mysql_close(); ?>
  </div>
</body>

</html>