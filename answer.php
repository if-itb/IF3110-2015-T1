<?php
    require_once "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !empty($_POST["id"]) && !empty($_POST["name"]) &&
        !empty($_POST["email"]) && !empty($_POST["content"])) {
        $id = $mysqli->real_escape_string($_POST["id"]);
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $content = $mysqli->real_escape_string($_POST["content"]);
        $query = "INSERT INTO answer (id_question, name, email, content) VALUES ('$id', '$name', '$email', '$content')";
        $mysqli->query($query);
    }
    $mysqli->close();

    backToHome();
?>
