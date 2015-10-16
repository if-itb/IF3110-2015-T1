<?php
  function get_connectqa() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
    return $conn;
  }

  function notNULL($x) {
    if ($x == NULL) {
      return 0;
    }
    return $x;
  }

  function printQAList($ID) {
    $conn = get_connectqa();

    // Select with ID
    $result = mysqli_query($conn, "SELECT * FROM questions LEFT JOIN (SELECT COUNT(answers.ID) AS Ans, Ans_ID AS Q_ID FROM questions JOIN answers WHERE questions.ID = answers.Ans_ID GROUP BY questions.ID ) AS temp ON questions.ID = temp.Q_ID WHERE ID=".$ID);
    $row = mysqli_fetch_assoc($result);
      echo '<h2>';
        echo $row['Topic'];
        echo '</h2>
        <div class = "question">
          <div class = "small-box">
            <div class = "middle" id = "votes"><span id = "questions';
              echo $ID;
              echo '">';
              echo $row['Votes'];
            echo '</span></div><p>
            <img class = "small-button" src="../img/unlike.jpg" alt="Unlike" onclick = \'like("questions",'.$ID.',-1)\'>
            &nbsp;
            <img class = "small-button" src="../img/like.jpg" alt="Like" onclick = \'like("questions",'.$ID.',1)\'></p>
          </div>
          <div class = "big-box">';
            echo $row['Content'];
            echo '
          </div>
          <div>
            <p class = "right">asked by ';
            echo $row['Name'];
            echo ' ';
            echo $row['Email'];
            echo ' at ';
            echo $row['Date'];
            echo '<a class = "hl-orange" href = "Question.php?edit=';
            echo $row['ID'];
            echo '"> edit</a> | <a class = "hl-red" href = # onclick = "deleteRow(';
            echo $row['ID'];
            echo ')">delete</a></p>
          </div>
        </div>
        <h2>';
        echo notNULL($row['Ans']);
        echo ' Answer(s)</h2>';
        $result = mysqli_query($conn, "SELECT * FROM answers WHERE answers.Ans_ID = ".$ID." ORDER BY Date ASC");
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class = "question">
            <div class = "small-box">
              <div class = "middle" id = "votes"><span id = "answers';
                echo $row['ID'];
                echo '">';
                echo $row['Votes'];
              echo '</span></div><p>
              <img class = "small-button" src="../img/unlike.jpg" alt="Unlike" onclick = \'like("answers",'.$row['ID'].',-1)\'>
              &nbsp;
              <img class = "small-button" src="../img/like.jpg" alt="Like" onclick = \'like("answers",'.$row['ID'].',1)\'></p>
            </div>
            <div class = "big-box">';
              echo $row['Content'];
              echo '
            </div>
            <div>
              <p class = "right">answered by ';
              echo $row['Name'];
              echo ' ';
              echo $row['Email'];
              echo ' at ';
              echo $row['Date'];
              echo '</p>
            </div>
          </div>';
        };
  }

  function printQList($ID) {
      $conn = get_connectqa();

      if ($ID == 0) {
        // Select all
        $result = mysqli_query($conn,"SELECT * FROM questions LEFT JOIN (SELECT COUNT(answers.ID) AS Ans, Ans_ID AS Q_ID FROM questions JOIN answers WHERE questions.ID = answers.Ans_ID GROUP BY questions.ID ) AS temp ON questions.ID = temp.Q_ID ORDER BY Date DESC");
      } else {
        // Search
        $search = $_GET['search'];
        $result = mysqli_query($conn,'SELECT * FROM questions LEFT JOIN (SELECT COUNT(answers.ID) AS Ans, Ans_ID AS Q_ID FROM questions JOIN answers WHERE questions.ID = answers.Ans_ID GROUP BY questions.ID ) AS temp ON questions.ID = temp.Q_ID WHERE Topic LIKE "%'.$search.'%" OR Content LIKE "%'.$search.'%" ');
      }

      while($row = mysqli_fetch_assoc($result)) {
        echo '<div class = "middle-box">
            <div class = "question">
              <div class = "small-box">
                <p>';
                echo $row['Votes'];
                echo '<br />
                Votes</p>
              </div>
              <div class = "small-box">
                <p>';
                echo notNULL($row['Ans']);
                echo '<br />
                Answers</p>
              </div>
              <div class = "big-box">
                <a class = "hl-black-medium" href = "Answer.php?ID=';
                echo $row['ID'];
                echo '">';
                echo $row['Topic'];
                echo '</a><br /><p class = "top-left">';
                echo substr($row['Content'], 0, 50);
                echo '</p>
              </div>
              <div>
                <p class = "right">Asked by | <span class = "hl-blue">';
                echo $row['Name'];
                echo '</span> | <a class = "hl-orange" href = "Question.php?edit=';
                echo $row['ID'];
                echo '"> edit</a> | <a class = "hl-red" href = # onclick = "deleteRow(';
                echo $row['ID'];
                echo ')">delete</a></p>
              </div>
            </div>
          </div>';
      }
      mysqli_close($conn);
  }

  function printQForm($id) {
    if ($id == -1) {
      echo '<form method = "post" name = "questions" onsubmit = "return qformValidation()">
        <input type = "text" class = "full-form" placeholder = "Name" name = "name" value = "">
        <br>
        <input type = "text" class = "full-form"placeholder = "Email" name = "email" value = "">
        <br>
        <input type = "text" class = "full-form"placeholder = "Question Topic" name = "qtopic" value = "">
        <br>
        <textarea class = "full-form" placeholder = "Content" name = "content" rows = "7"></textarea>
        <br>
        <input type = "submit" class = "post-button" name = "post" value = "Post">
      </form>';
    }
    else {
      $conn = get_connectqa();
      $result = mysqli_query($conn,"SELECT * FROM questions WHERE ID = ".$id);
      $row = mysqli_fetch_assoc($result);
      echo '<form method = "post" name = "questions" onsubmit = "return qformValidation()">
          <input type = "text" class = "full-form" placeholder = "Name" name = "name" value = "';
          echo $row['Name'];
          echo '">
          <br>
          <input type = "text" class = "full-form"placeholder = "Email" name = "email" value = "';
          echo $row['Email'];
          echo '">
          <br>
          <input type = "text" class = "full-form"placeholder = "Question Topic" name = "qtopic" value = "';
          echo $row['Topic'];
          echo '">
          <br>
          <textarea class = "full-form" placeholder = "Content" name = "content" rows = "7">';
          echo $row['Content'];
          echo '</textarea>
          <br>
          <input type = "submit" class = "post-button" name = "post" value = "Post">
        </form>';
        mysqli_close($conn);
    }
  }
  ?>