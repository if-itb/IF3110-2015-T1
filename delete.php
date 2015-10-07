<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])) {
        require_once "db.php";
        $id = $mysqli->real_escape_string($_GET["id"]);
        $query = "DELETE FROM question WHERE id='$id'";
        $mysqli->query($query);
        $query = "DELETE FROM answer WHERE id_question='$id'";
        $mysqli->query($query);
        $mysqli->close();
        require_once "function.php";
        backToHome();
    }
?>
