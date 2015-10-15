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
      <?php  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "stackexchange";
        $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
        @mysql_select_db('stackexchange') or die(mysql_error());
        $question_id = $_GET["id"];
        $queryVote = "SELECT `Vote` FROM `question` WHERE (ID = $question_id)";
        $result = mysql_query($queryVote);
        $vote = mysql_result($result, 0);
      ?>
      <div class="question-description">
        <div class="votes">
          <div class="vote-question-up" id-question="<?= $question_id ?>" ></div>
          <div class="count-answer">
            <p id="count_question"><?= $vote ?></p>
          </div>
          <div class="vote-question-down" id-question="<?= $question_id ?>"></div>
        </div>
        <div class="question-list">
        <?php
          $query = "SELECT * FROM question WHERE (ID = $question_id)";
          $result = mysql_query($query);
          $name = mysql_result($result, 0, "Nama");
          $email = mysql_result($result, 0, "Email");
          $topic = mysql_result($result, 0, "Topic");
          $content = mysql_result($result, 0, "Content");
          $date_question = mysql_result($result, 0, "Date");
        ?>
          <div class="content">
            <p><?php echo $topic; ?></p>
          </div>
          <div class="question-content1">
            <p><?= $content ?></p>
          </div>
          <br><br><br>
          <div class="asked-description">
            <p>Asked by <span style="color : #502fc8"><?php echo "$email"; ?></span> at <?php echo "$date_question"; ?> |
              <span style="color : #ffcb55"><a href=" /WBD/update-question.php?id=<?= $question_id ?>">edit</a></span> |
              <span style="color : #fd294a"><a href=" /WBD/delete.php?id=<?= $question_id ?>" onclick="return confirm('Do you want to delete this question?');">delete</a></span></p>
          </div>
        </div>
      </div>
      <?php
        $sql = "SELECT * FROM `answer` WHERE (question_ID = $question_id)";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
      ?>
      <div class="total-answer">
        <h2><?= $num ?> Answer</h2>
      </div>
      <hr>
      <div class="answer-description">
        <?php
          $i = 0;
          while ($i<$num){
            $question_id = mysql_result($result, $i, "question_ID");
            $name = mysql_result($result, $i, "Nama");
            $email = mysql_result($result, $i, "Email");
            $content = mysql_result($result, $i, "Content");
            $vote = mysql_result($result, $i, "Vote");
            $date = mysql_result($result, $i, "Date");
            $answer_id = mysql_result($result, $i, "ID");
        ?>
        <div class="votes">
          <div class="vote-answer-up" id-question="<?= $question_id ?>" id-answer="<?= $answer_id ?>"></div>
          <?php
            $sqlanswer = "SELECT `Vote` FROM `answer` WHERE (`question_ID` = '$question_id') AND (`ID` = '$answer_id')";
            $num_count_ans = mysql_query($sqlanswer);
            $voteanswer = mysql_result($num_count_ans, 0);
          ?>
          <div class="count-answer">
            <p id="count_answer<?= $answer_id ?>"><?= $voteanswer ?></p>
          </div>
          <div class="vote-answer-down" id-question="<?= $question_id ?>" id-answer="<?= $answer_id ?>"></div>
        </div>
        <div class="answer-list">
          <p><?php echo "$content"; ?></p>
          <div class="asked-description">
            <p>Answered by <span style="color : #502fc8"><?php echo "$email"; ?></span> at <?php echo "$date"; ?></p>
          </div>
          <hr>
        </div>
        <?php $i++; } ?>
      </div>
      <center>
        <form class="answer-form" action="answer-input.php?id=<?= $question_id ?>" method="POST">
          <input type="text" placeholder="  Name" name="Name"><br>
          <input type="text" placeholder="  Email" name="Email"><br>
          <textarea type="text" placeholder=" Content" name="Content"></textarea>
          <button type="submit" value="Submit">Post</button>
        </form>
      </center>
    </div>
    <?php mysql_close(); ?>
  </div>
  <script type="text/javascript" src="vote.js" ></script>
</body>

</html>