<?php if (
    !empty($_POST["name"]) && !empty($_POST["email"]) &&
    !empty($_POST["content"] && !empty($_POST["id"]))): ?>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $content = $mysqli->real_escape_string($_POST["content"]);
        $id_question = $mysqli->real_escape_string($_POST["id"]);
        $query = "INSERT INTO answer (name, email, content, id_question) VALUES ('$name', '$email', '$content', '$id_question')";
        $mysqli->query($query);
        header("Location: question.php?id=". $id_question);
        die();
    ?>
<?php elseif (!empty($_GET["id"])): ?>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
        $query = "SELECT * FROM question WHERE id='" . $mysqli->real_escape_string($_GET["id"]) . "'";
        $question_result = $mysqli->query($query);
        if (!$question_result->num_rows) {
            header("Location: index.php");
            die();
        }
        $question_row = $question_result->fetch_assoc();
        include("header.php");
    ?>
    <h3><?php echo $question_row["topic"]; ?></h3>
    <hr>
    <?php
        echo $question_row["vote"] . PHP_EOL;
        echo $question_row["content"] . PHP_EOL;
        echo "asked by " . $question_row["name"] . " at " . $question_row["time"] . " | <a href=ask.php?id=".$question_row["id"].">edit</a> | delete" . PHP_EOL;

        $query = "SELECT * FROM answer WHERE id_question='". $question_row["id"] . "'";
        $answer_result = $mysqli->query($query);
        echo "<h3>" . $answer_result->num_rows . " Answer</h3>" . PHP_EOL . "<hr>";
        while ($answer_row = $answer_result->fetch_assoc()) {
            echo $answer_row["vote"] . PHP_EOL;
            echo $answer_row["content"] . PHP_EOL;
            echo "answered by " . $answer_row["name"] . " at " . $answer_row["time"] . PHP_EOL;
            echo "<hr>";
        }
        echo "<h3>Your Answer</h3><hr>\n";
        echo '<form action="question.php" method="post">';
        echo '<input name="name" placeholder="Name"></input>';
        echo '<input name="email" placeholder="Email"></input>';
        echo '<input name="content" placeholder="Content"></input>';
        echo '<input type="submit" placeholder="Post"></input>';
        echo '<input type="hidden" name="id" value="'. $question_row["id"] .'"></input>';
        echo '</form>';
    ?>
    </body>
    </html>
<?php else: ?>
    <?php
        header("Location: index.php");
        die();
    ?>
<?php endif; ?>
