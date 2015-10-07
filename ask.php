<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["topic"]) && !empty($_POST["content"])): ?>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
        $name = $_POST["name"];
        $email = $_POST["email"];
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        if (empty($_POST["id"])) {
            $query = "INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
            $id = $mysqli->query($query)->insert_id;
        }
        else {
            $id = $mysqli->real_escape_string($_POST["id"]);
            $query = "UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id='$id'";
            $mysqli->query($query);
        }
        header("Location: question.php?id=". $id);
        $mysqli->close();
        die();
    ?>
<?php else: ?>
    <?php include("header.php"); ?>
    <div class="container">
        <h3>What's your question?</h3>
        <hr class="heading">
        <?php
            require_once "function.php";
            if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])) {
                $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
                $id = $mysqli->real_escape_string($_GET["id"]);
                $query = "SELECT * FROM question WHERE id='$id'";
                $result = $mysqli->query($query);
                if ($row = $result->fetch_assoc())
                    displayAsk($row["name"], $row["email"], $row["topic"], $row["content"], $row["id"]);
                else
                    backToHome();
                $mysqli->close();
            }
            else {
                displayAsk();
            }
        ?>
    </div>
<?php endif; ?>

