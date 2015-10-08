<?php
    require_once "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["topic"]) && !empty($_POST["content"])) {
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $topic = $mysqli->real_escape_string($_POST["topic"]);
        $content = $mysqli->real_escape_string($_POST["content"]);
        if (empty($_POST["id"])) {
            $query = "INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
            $mysqli->query($query);
            $id = $mysqli->insert_id;
        }
        else {
            $id = $mysqli->real_escape_string($_POST["id"]);
            $query = "UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id='$id'";
            $mysqli->query($query);
        }
        header("Location: question.php?id=". $id);
        die();
    }
    else {
        require_once "function.php";
        require_once "header.php";
        echo '<div class="container">';
            echo '<h3>What\'s your question?</h3>';
            echo '<hr class="heading">';
            if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])) {
                $id = $mysqli->real_escape_string($_GET["id"]);
                $query = "SELECT * FROM question WHERE id='$id'";
                $result = $mysqli->query($query);
                if ($row = $result->fetch_assoc()) {
                    displayAsk($row["name"], $row["email"], $row["topic"], $row["content"], $row["id"]);
                }
                else {
                    displayAsk();
                }
            }
            else {
                displayAsk();
            }
        echo '</div>';
        require_once "footer.php";
    }
    $mysqli->close();
?>

