<?php
    $mysqli = new mysqli("localhost", "root", "", "exchangelyz");

    // check error
    if ($mysqli->connect_errno) {
        echo "Connect failed: " . $mysqli->connect_error;
        exit();
    }

    // query from database
    if ($result = $mysqli->query("SELECT * FROM question ORDER BY vote DESC LIMIT 10")) {
        while ($row = $result->fetch_assoc()) {
            $id_question = $row["id"];
            $answer = $mysqli->query("SELECT id FROM answer WHERE id_question=$id_question");
            echo $row["vote"] . " votes " . $answer->num_rows . " answers";
            $answer->close();
            echo "<h3>". $row["topic"] ."</h3>";
            echo "<p>". $row["content"] . "</p>";
            echo "asked by " . $row["name"] . " | edit | delete";
            echo "<hr>";
        }
        $result->close();
    }

    $mysqli->close();
?>
