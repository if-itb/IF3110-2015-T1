<?php
    $mysqli = new mysqli("localhost", "root", "", "exchangelyz");

    // check error
    if ($mysqli->connect_errno) {
        echo "Connect failed: " . $mysqli->connect_error;
        exit();
    }

    // query from database
    if ($result = $mysqli->query("SELECT * FROM question ORDER BY time DESC LIMIT 10")) {
        while ($row = $result->fetch_assoc()) {
            $id_question = $row["id"];
            $answer = $mysqli->query("SELECT id FROM answer WHERE id_question=$id_question");
            echo $row["vote"] . " votes " . $answer->num_rows . " answers" . PHP_EOL;
            $answer->close();
            echo "<a href=question.php?id=". $row["id"] . ">". $row["topic"] ."</a>";
            echo "<p>". $row["content"] . "</p>";
            echo 'asked by ' . $row["name"] . ' | <a href=ask.php?id='.$row["id"].'>edit</a> | delete';
            echo "<hr>";
        }
        $result->close();
    }

    $mysqli->close();
?>
