<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) -->
<!-- File: answer-question-detail.php  -->

<!DOCTYPE html>
<html>
  <head>
    <title>Question Detail</title>
    <meta charset="utf-8"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  </head>
  <body>
    <?php
      // Create connection to database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "simple_stackexchange";
      $connection = new mysqli($servername, $username, $password, $dbname);
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      // Execute query to take question clicked by user
      $id_question = $_GET["id_question"];
      $query = "SELECT id_question, topic, content, vote_num, datetime, email FROM question, user WHERE question.id_user = user.id_user and id_question = $id_question";
      $question = $connection->query($query);

      // Submit answer form value to database
      if (isset($_POST["submit"])) {
        $new_answer_content = str_replace("\n", "<br>", str_replace("'", "''", $_POST["content"]));
        $new_user_name = $_POST["name"];
        $new_user_email = $_POST["email"];
        $query = "SELECT id_user FROM user WHERE name = '$new_user_name' AND email = '$new_user_email'";
        echo $query . "<br>";
        $id_user = $connection->query($query);

        if ($id_user->num_rows < 0) {
          // User account haven't made before. New user made in database
          $query = "INSERT INTO user VALUES ('', '$new_user_name', '$new_user_email')";
          // Fetch new id user from database
          if ($connection->query($query) === TRUE) {
            $query = "SELECT id_user FROM user WHERE name = '$new_user_name' AND email = '$new_user_email'";
            $id_user = $connection->query($query);
          }
        }
        $new_user_id = $id_user->fetch_assoc()["id_user"];
        $query = "INSERT INTO answer VALUES ('', '$new_answer_content', 0, NOW(), $new_user_id, $id_question)";
        $answer_inserted = $connection->query($query);
      }

      // Execute query to take number of answers
      $query = "SELECT COUNT(id_answer) FROM answer, question WHERE answer.id_question = $id_question";
      $answer_num_result = $connection->query($query);
      $answer_num = $answer_num_result->fetch_assoc();
      // Execute query to take all associated answers
      $query = "SELECT id_answer, content, vote_num, datetime, email FROM answer, user WHERE answer.id_user = user.id_user AND id_question = $id_question";
      $answers = $connection->query($query);
    ?>

    <!-- Title -->
    <div class="title">
      Simple StackExchange
    </div>

    <div class="content">
      <!-- Question -->
      <div class="stacked">
        <div class="subtitle">
          <?php
            if ($question->num_rows > 0) {
              $question = $question->fetch_assoc();
              echo $question["topic"];
            }
          ?>
        </div>
        <!-- Questions Content -->
        <div class="same-height-row border-bottom">
          <div class="vote-number">
            <a href="">
              <img class="small-icon" src="../img/up.png"/><br>
            </a>
            <div class="big-number">
              <?php echo $question["vote_num"] ?>
            </div>
            <a href="">
              <img class="small-icon" src="../img/down.png"/><br>
            </a>
          </div>
          <div class="right-position">
            <div class="answer-question-detail">
              <?php echo $question["content"] ?>
            </div>
            <!-- Asked by -->
            asked by
            <?php echo $question["email"] ?>
            at
            <?php echo $question["datetime"] ?>
            |
            <a class="yellow" href="">
              edit
            </a>
            |
            <a class="red" href="index.html" onclick="deleteConfirmation()">
              delete
            </a>
          </div>
        </div>
      </div>
      
      <!-- Answers List -->
      <div class="stacked">
        <div class="subtitle">
          <?php echo $answer_num["COUNT(id_answer)"] ?>
           Answer
        </div>

        <!-- Answers -->
        <?php
          if ($answers->num_rows > 0) {
            while ($answer = $answers->fetch_assoc()) {
        ?>
        <div class="same-height-row border-bottom">
          <div class="vote-number">
            <a href="">
              <img class="small-icon" src="../img/up.png"/><br>
            </a>
            <div class="big-number">
              <?php echo $answer["vote_num"] ?>
            </div>
            <a href="">
              <img class="small-icon" src="../img/down.png"/><br>
            </a>
          </div>
          <!-- Answers Content -->
          <div class="right-position">
            <div class="answer-question-detail">
              <?php echo $answer["content"] ?>
            </div>
            answered by
            <?php echo $answer["email"] ?>
            at
            <?php echo $answer["datetime"] ?>
          </div>
        </div>
        <?php
            } // End of while
          } // End of if
        ?>
      </div>

      <!-- Answer Form -->
      <div class="stacked">
        <div id="answer-form-title">
          Your Answer
        </div>
        <form class="right" id="answer-form" action="" method="post" onsubmit="formValidation()">
          <input class="full-length" id="name" name="name" type="text" placeholder="Name">
          <input class="full-length" id="email" name="email" type="text" placeholder="Email">
          <textarea class="full-length" id="content" name="content" placeholder="Content" rows="10" cols="50"></textarea>
          <input class="button" name="submit" type="submit" value="Post">
        </form>
      </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
  </body>
</html>
