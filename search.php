<?php
    require_once "function.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["q"])) {
        require_once "db.php";
        $search = $mysqli->real_escape_string($_GET["q"]);
        $query = "SELECT * FROM question WHERE content LIKE '%$search%' OR topic LIKE '%$search%'";
        $result = $mysqli->query($query);
        require_once 'header.php';
        echo '<div class="container">';
            echo '<h3>Search for: '. $search .'</h3>';
            echo '<hr class="heading">';
            while ($row = $result->fetch_assoc()) {
                $query = "SELECT id FROM answer WHERE id_question='". $row["id"] ."'";
                displayQuestionList($row["id"], $row["topic"], $row["name"], $row["email"], $row["content"], $row["time"], $row["vote"], $mysqli->query($query)->num_rows);
            }
        echo '</div>';
        $mysqli->close();
        require_once "footer.php";
    }
    else {
        backToHome();
    }
?>
