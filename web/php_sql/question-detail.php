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

      $id_question = $_GET["id_question"];
      $id_user = $_GET["id_user"];
      if (isset($_POST["question-submit"]) && !empty($_POST["question-submit"])) {
        $name = $_POST["question-name"];
        $email = $_POST["question-email"];
        $topic = str_replace("'", "''", $_POST["question-topic"]);
        $content = str_replace("\n", "<br>", str_replace("'", "''", $_POST["question-content"]));
        if ($id_question == "unknown" && $id_user == "unknown") {
          // Insert new question from ask-question.php to database
          // Search user ID
          $query = "SELECT id_user FROM user WHERE name = '$name' AND email = '$email'";
          $id_user = $connection->query($query);
          if ($id_user->num_rows <= 0) {
            // User account haven't made before. New user made in database
            $query = "INSERT INTO user VALUES ('', '$name', '$email')";
            // Fetch new id user from database
            if ($connection->query($query) === TRUE) {
              $query = "SELECT id_user FROM user WHERE name = '$name' AND email = '$email'";
              $id_user = $connection->query($query);
            }
          }
          $id_user = $id_user->fetch_assoc()["id_user"];
          $query = "INSERT INTO question VALUES ('', '$topic', '$content', 0, NOW(), $id_user)";
          $question_inserted = $connection->query($query);

          // Get question ID
          $query = "SELECT id_question FROM question WHERE topic = '$topic' AND content = '$content' AND vote_num = 0 AND id_user = $id_user";
          $id_question = $connection->query($query);
          $id_question = $id_question->fetch_assoc()["id_question"];
        } else {
          // Update question edited from ask-question.php to database
          // Update user name and email
          $query = "SELECT name, email FROM user WHERE id_user = $id_user";
          $user_data = $connection->query($query);
          $user_data = $user_data->fetch_assoc();
          if ($user_data["name"] != $name || $user_data["email"] != $email) {
            // User name or email have been changed
            $query = "SELECT id_user FROM user WHERE name = '$name' AND email = '$email'";
            $id_user = $connection->query($query);
            if ($id_user->num_rows > 0) {
              $id_user = $id_user->fetch_assoc()["id_user"];
            } else {
              // No user in database
              $query = "INSERT INTO user VALUES ('', '$name', '$email')";
              if ($connection->query($query) === TRUE) {
                $query = "SELECT id_user FROM user WHERE name = '$name' AND email = '$email'";
                $id_user = $connection->query($query);
                $id_user = $id_user->fetch_assoc()["id_user"];
              }
            }
            // Update new id user to database
            $query = "UPDATE question SET id_user = $id_user WHERE id_question = $id_question";
            $isQuestionUpdated = $connection->query($query);
          }

          // Update question topic and content
          $query = "UPDATE question SET topic = '$topic', content = '$content' WHERE id_question = $id_question";
          $isQuestionUpdated = $connection->query($query);
        }
      }

      // Execute query to take question clicked by user at home page
      $query = "SELECT id_question, topic, content, vote_num, datetime, email FROM question, user WHERE question.id_user = user.id_user AND id_question = $id_question";
      $question = $connection->query($query);
      $question = $question->fetch_assoc();

      // Submit answer form values to database
      if (isset($_POST["answer-submit"]) && !empty($_POST["answer-submit"])) {
        $new_answer_content = str_replace("\n", "<br>", str_replace("'", "''", $_POST["answer-content"]));
        $new_user_name = $_POST["answer-name"];
        $new_user_email = $_POST["answer-email"];

        $query = "SELECT id_user FROM user WHERE name = '$new_user_name' AND email = '$new_user_email'";
        $answer_id_user = $connection->query($query);
        if ($answer_id_user->num_rows <= 0) {
          // User account haven't made before. New user made in database
          $query = "INSERT INTO user VALUES ('', '$new_user_name', '$new_user_email')";
          // Fetch new id user from database
          if ($connection->query($query) === TRUE) {
            $query = "SELECT id_user FROM user WHERE name = '$new_user_name' AND email = '$new_user_email'";
            $answer_id_user = $connection->query($query);
          }
        }
        $new_user_id = $answer_id_user->fetch_assoc()["id_user"];
        $query = "INSERT INTO answer VALUES ('', '$new_answer_content', 0, NOW(), $new_user_id, $id_question)";
        $answer_inserted = $connection->query($query);
      }

      // Execute query to take number of answers
      $query = "SELECT COUNT(id_answer) FROM answer WHERE answer.id_question = $id_question";
      $answer_num_result = $connection->query($query);
      if ($answer_num_result->num_rows > 0) {
        $answer_num = $answer_num_result->fetch_assoc();
        // Execute query to take all associated answers
        $query = "SELECT id_answer, content, vote_num, datetime, email FROM answer, user WHERE answer.id_user = user.id_user AND id_question = $id_question";
        $answers = $connection->query($query);
      } else {
        $answer_num = 0;
      }
    ?>

    <!-- Title -->
    <div class="title">
      <a href="index.php">
        Simple StackExchange
      </a>
    </div>

    <div class="content">
      <!-- Question -->
      <div class="stacked">
        <div class="subtitle">
          <?php
            echo $question["topic"];
          ?>
        </div>
        <!-- Questions Content -->
        <div class="same-height-row border-bottom">
          <div class="vote-number">
            <img class="small-icon" src="../img/up.png" onclick="updateVote(true, <?php echo $id_question ?>, 1)"/><br>
            <div class="big-number" id="question-<?php echo $id_question ?>">
              <?php echo $question["vote_num"] ?>
            </div>
            <img class="small-icon" src="../img/down.png" onclick="updateVote(true, <?php echo $id_question ?>, -1)"/><br>
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
            <a class="yellow" href="ask-question.php?id_question=<?php echo $id_question ?>">
              edit
            </a>
            |
            <a class="red" href="index.php?id_question=<?php echo $id_question ?>" onclick="return confirm('Do you want to delete this post?')">
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
            <img class="small-icon" src="../img/up.png" onclick="updateVote(false, <?php echo $answer['id_answer'] ?>, 1)"/><br>
            <div class="big-number" id="answer-<?php echo $answer['id_answer'] ?>">
              <?php echo $answer["vote_num"] ?>
            </div>
            <img class="small-icon" src="../img/down.png" onclick="updateVote(false, <?php echo $answer['id_answer'] ?>, -1)"/><br>
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
          } else {
            // No answers yet
        ?>
        <div class="same-height-row border-bottom">
          Sorry, there are no answers available yet. Know someone who can answer?
        </div>
        <?php
          } // End of if
        ?>
      </div>

      <!-- Answer Form -->
      <div class="stacked">
        <div id="answer-form-title">
          Your Answer
        </div>
        <form class="right" id="answer-form" name="answer-form" action="question-detail.php?id_question=<?php echo $id_question ?>&id_user=<?php echo $id_user ?>" method="post" onsubmit="return questionFormValidation()">
          <input class="full-length" id="answer-name" name="answer-name" type="text" placeholder="Name">
          <input class="full-length" id="answer-email" name="answer-email" type="text" placeholder="Email">
          <textarea class="full-length" id="answer-content" name="answer-content" placeholder="Content" rows="10" cols="50"></textarea>
          <input class="button" name="answer-submit" type="submit" value="Post">
        </form>
      </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
  </body>
</html>
