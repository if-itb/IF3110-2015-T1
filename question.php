<?php
    require_once "db.php";
    require_once "function.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["content"] && !empty($_POST["id"]))) {
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $content = $mysqli->real_escape_string($_POST["content"]);
        $id_question = $mysqli->real_escape_string($_POST["id"]);
        $query = "INSERT INTO answer (name, email, content, id_question) VALUES ('$name', '$email', '$content', '$id_question')";
        $mysqli->query($query);
        $mysqli->close();
        header("Location: question.php?id=". $id_question);
        die();
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])) {
        $query = "SELECT * FROM question WHERE id='" . $mysqli->real_escape_string($_GET["id"]) . "'";
        $question_result = $mysqli->query($query);
        if (!$question_result->num_rows)
            backToHome();
        $question_row = $question_result->fetch_assoc();

        require_once "header.php";
        echo '<div class="container">';
            echo '<h3>'. $question_row["topic"] .'</h3>';
            echo '<hr class="heading">';
            displayQuestion($question_row["id"], $question_row["name"], $question_row["email"],$question_row["content"], $question_row["time"], $question_row["vote"]);
            echo '<br>';
            $query = "SELECT * FROM answer WHERE id_question='". $question_row["id"] ."'";
            $result = $mysqli->query($query);
            if ($result->num_rows) {
                echo '<h3>'. $result->num_rows .' Answer'. (($result->num_rows > 1) ?'s':'') .'</h3>';
                echo '<hr class="heading">';
                echo '<div class="answer-list">';
                    $count = 0;
                    while ($answer_row = $result->fetch_assoc()) {
                        displayAnswer($answer_row["id"], $answer_row["name"], $answer_row["email"],$answer_row["content"], $answer_row["time"], $answer_row["vote"]);
                        if (++$count < $result->num_rows)
                            echo '<hr>';
                    }
                echo '</div>';
            }

            echo '<br>';
            echo '<hr class="heading">';
            echo '<h3>Your Answer</h3>';
            displayAnswerForm($question_row["id"]);
        echo '</div>';
        require_once "footer.php";
        $mysqli->close();
    }
    else {
        $mysqli->close();
        backToHome();
    }
?>
