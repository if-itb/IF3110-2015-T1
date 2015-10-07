<?php
    require_once "db.php";

    if (!empty($_GET["q"])) {
        $search = $mysqli->real_escape_string($_GET["q"]);
        $query = "SELECT * FROM question WHERE content LIKE '%$search%' OR topic LIKE '%$search%'";
        $result = $mysqli->query($query);
        require_once 'header.php';
        echo "Search for: " . $search;
        while ($row = $result->fetch_assoc()) {
            echo "<hr>";
            $id_question = $row["id"];
            $answer = $mysqli->query("SELECT id FROM answer WHERE id_question=$id_question");
            echo $row["vote"] . " votes " . $answer->num_rows . " answers" . PHP_EOL;
            $answer->close();
            echo "<a href=question.php?id=". $row["id"] . ">". $row["topic"] ."</a>";
            echo "<p>". $row["content"] . "</p>";
            echo "asked by " . $row["name"] . " | <a href=ask.php?id='.$row["id"].'>edit</a> | delete";
        }
        echo "<hr>";
        $mysqli->close();
    }
    else {
        $mysqli->close();
        backToHome();
    }

    require_once "footer.php";
?>
