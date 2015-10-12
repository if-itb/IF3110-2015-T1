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
          <p><?php echo $topic; ?></p>
          <div class="asked-description">
            <p>Asked by <span style="color : #502fc8">name</span> at date/time |
              <span style="color : #ffcb55">edit</span> |
              <span style="color : #fd294a">delete</span></p>
          </div>
        </div>
      </div>
      <br><br><br>

      <div class="total-answer">
        <h2>1 Answer</h2>
      </div>
      <hr>
      <div class="answer-description">
        <div class="votes">
          <div class="vote-up"></div>
          <div class="count-answer">
            <p>0</p>
          </div>
          <div class="vote-down"></div>
        </div>
        <div class="question-list">
          <p>The question topic goes here</p>
          <div class="asked-description">
            <p>Asked by <span style="color : #502fc8">name</span> at date/time |
              <span style="color : #ffcb55">edit</span> |
              <span style="color : #fd294a">delete</span></p>
          </div>
        </div>
      </div>
      <hr>
      <center>
        <form class="answer-form" action="answer-input.php" method="POST">
          <input type="text" placeholder="  Name" name="Name"><br>
          <input type="text" placeholder="  Email" name="Email"><br>
          <input type="text" placeholder="  Quesition Topic" name="Question-topic"><br>
          <textarea type="text" placeholder=" Content" name="Content"></textarea>
        </form>
          <button type="submit" value="Submit">Post</button>
      </center>
    </div>
  </div>
</body>

</html>