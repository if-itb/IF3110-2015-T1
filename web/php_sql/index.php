<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) -->
<!-- File: index.php -->

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
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

      // Delete question from database
      if (isset($_GET["id_question"]) && !empty($_GET["id_question"])) {
        $id_question_deleted = $_GET["id_question"];
        $query = "DELETE FROM question WHERE id_question = $id_question_deleted";
        $isQuestionDeleted = $connection->query($query);
      }

      // Search question from search box
      if (isset($_POST["search-submit"]) && !empty($_POST["search-submit"])) {
        $search_key = $_POST["search-key"];
        $query = "SELECT id_question, topic, content, vote_num, datetime, question.id_user, name FROM question, user WHERE question.id_user = user.id_user AND (topic LIKE '%$search_key%' OR content LIKE '%$search_key%') ORDER BY datetime DESC";
      } else {
        // Execute query to take all questions in databases
        $query = "SELECT id_question, topic, content, vote_num, datetime, question.id_user, name FROM question, user WHERE question.id_user = user.id_user ORDER BY datetime DESC";
      }
      $questions = $connection->query($query);
    ?>

    <!-- Title -->
    <div class="title">
      <a href="index.php">
        Simple StackExchange
      </a>
    </div>

    <div class="content">
      <!-- Search Bar -->
      <div class="stacked" id="search-section">
        <form id="search-form" name="search-form" action="" method="post" onsubmit="return searchFormValidation()">
          <input id="search-key" name="search-key" type="text">
          <input class="button" name="search-submit" type="submit" value="Search">
        </form>
        <br>
        Cannot find what you are looking for? 
        <a class="yellow" href="ask-question.php">
          Ask here
        </a>
      </div>

      <!-- Recently Asked Questions -->
      <div class="stacked">
        <div class="subtitle">
          Recently Asked Questions
        </div>
        <div class="questions-list">
          <?php
            if ($questions->num_rows > 0) {
              while($question = $questions->fetch_assoc()) {
                // Count answer number
                $id_question = $question["id_question"];
                $query = "SELECT COUNT(id_answer) FROM answer WHERE answer.id_question = $id_question";
                $answer_num_result = $connection->query($query);
                $answer_num = $answer_num_result->fetch_assoc();
          ?>
          <div class="same-height-row border-bottom">
            <div class="vote-number">
              <?php echo $question["vote_num"] ?>
              <br>
              Votes
            </div>
            <div class="answer-number">
              <?php echo $answer_num["COUNT(id_answer)"] ?>
              <br>
              Answers
            </div>
            <div class="right-position">
              <div class="answer-question-detail">
                <!-- Question Topic & Content -->
                <a href="question-detail.php?id_question=<?php echo $question['id_question'] ?>&id_user=<?php echo $question['id_user'] ?>">
                  <div class="question-topic">
                    <?php echo $question["topic"] ?>
                  </div>
                  <div class="question-content">
                    <?php
                      $number_content_words = str_word_count($question["content"]);
                      if ($number_content_words > 50) {
                        // Cut question's content displayed
                        $question_print = implode(' ', array_slice(explode(' ', $question["content"]), 0, 50)) . "...";
                      } else {
                        $question_print = $question["content"];
                      }
                      if (isset($_POST["search-submit"]) && !empty($_POST["search-submit"])) {
                        echo str_replace($search_key, "<span class='bold'>".$search_key."</span>", $question_print);
                      } else{
                        echo $question_print;
                      } 
                    ?>
                  </div>
                </a>
              </div>
              asked by
              <span class="blue">
                <?php echo $question["name"] ?>
              </span>
              |
              <a class="yellow" href="ask-question.php?id_question=<?php echo $question['id_question'] ?>">
                edit
              </a>
              |
              <a class="red" href="index.php?id_question=<?php echo $id_question ?>" onclick="return confirm('Do you want to delete this post?')">
                delete
              </a>
            </div>
          </div>
          <?php
              } // End of while
              mysqli_free_result($answer_num_result);
            } else {
              echo "Sorry, no questions found.";
            } // End of if
          ?>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
    <?php
      mysqli_free_result($questions);
    ?>
  </body>
</html>
