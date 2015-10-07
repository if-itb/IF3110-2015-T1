<?php
    function backToHome() {
        header("Location: index.php");
        die();
    }

    function displayAllQuestionList() {
        $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
        // check error
        if ($mysqli->connect_errno) {
            echo "Connect failed: " . $mysqli->connect_error;
            exit();
        }
        // query from database
        if ($result = $mysqli->query("SELECT * FROM question ORDER BY time DESC LIMIT 10")) {
            while ($row = $result->fetch_assoc()) {
                $query = "SELECT id FROM answer WHERE id_question='". $row["id"] ."'";
                $answers = $mysqli->query($query)->num_rows;
                displayQuestionList(
                    $row["id"], $row["topic"], $row["name"], $row["email"],
                    $row["content"], $row["time"], $row["vote"], $answers);
            }
            $result->close();
        }
        $mysqli->close();
    }

    function displayQuestionList($id, $topic, $name, $email, $content, $time, $vote, $answer) {
        echo '<div class=question-item>';
            echo '<div class="stat">';
                echo '<div class="vote">';
                    echo '<div class="vote-count-mini">';
                        echo '<span title="'. $vote .' votes">'. $vote .'</span>';
                    echo '</div>';
                    echo '<div>votes</div>';
                echo '</div>';

                echo '<div class="answer">';
                    echo '<div class="answer-count-mini">';
                        echo '<span title="'. $answer .' answers">'. $answer .'</span>';
                    echo '</div>';
                    echo '<div>answers</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="question-summary">';
                echo '<h3 class="topic"><a class="topic" href="question.php?id='. $id .'">'. $topic .'</a></h3>';
                echo '<p>'. $content .'</p>';
                echo '<div class="timestamp">';
                    echo 'asked by '. $name .' at '. $time .' | <a href=ask.php?id='. $id .'>edit</a> | <a href="#">delete</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<hr class="item">';
    }

    function displayAsk($name = "", $email = "", $topic = "", $content = "", $id = 0) {
        echo '<form action="ask.php" method="post">';
            echo '<input type="text" name="name" placeholder="Name" autofocus value="'.$name.'"></input>';
            echo '<input type="text" name="email" placeholder="Email" value="'.$email.'"></input>';
            echo '<input type="text" name="topic" placeholder="Question Topic" value="'.$topic.'"></input>';
            echo '<textarea  name="content" placeholder="Content" rows="7">'. $content .'</textarea>';
            echo '<input type="submit" class="btn-default btn-right" value="Post"></input>';
            if ($id)
            echo '<input type="hidden" name="id" value="'. $id .'"></input>';
        echo '</form>';
    }

    function displayAnswerForm($id) {
        echo '<form action="answer.php" method="post">';
            echo '<input type="text" name="name" placeholder="Name"></input>';
            echo '<input type="text" name="email" placeholder="Email"></input>';
            echo '<textarea  name="content" placeholder="Content" rows="7"></textarea>';
            echo '<input type="submit" class="btn-default btn-right" value="Post"></input>';
            echo '<input type="hidden" name="id" value="'. $id .'"></input>';
        echo '</form>';
    }

    function displayQuestion($id, $name, $email, $content, $time, $vote) {
        echo '<div class="question-item">';
            echo '<div class="vote-panel">';
                echo '<div class="vote-up"></div>';
                echo '<div class="vote-count">';
                    echo '<span title="'. $vote .' votes">'. $vote .'</span>';
                echo '</div>';
                echo '<div class="vote-down"></div>';
            echo '</div>';
            echo '<div class="question-content">';
                echo '<p>'. $content .'</p>';
                echo '<div class="timestamp">';
                    echo 'asked by '. $name .' at '. $time .' | <a href=ask.php?id='. $id .'>edit</a> | <a href="#">delete</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }

    function displayAnswer($id, $name, $email, $content, $time, $vote) {
        echo '<div class="answer-item">';
            echo '<div class="vote-panel">';
                echo '<div class="vote-up"></div>';
                echo '<div class="vote-count">';
                    echo '<span title="'. $vote .' votes">'. $vote .'</span>';
                echo '</div>';
                echo '<div class="vote-down"></div>';
            echo '</div>';
            echo '<div class="answer-content">';
                echo '<p>'. $content .'</p>';
                echo '<div class="timestamp">';
                    echo 'answered by '. $name .' at '. $time;
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
?>
