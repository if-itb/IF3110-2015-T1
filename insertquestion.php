<?php
    $servername = "localhost";
    $username = "root";
    $password="";
    $db = "stackexchange";

    $mysqli = new mysqli($servername, $username, $password, $db);

    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (!($stmt = $mysqli->prepare("INSERT INTO question(votes, name, email, topic, content) VALUES(?, ?, ?, ?, ?)"))) {
        die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    }

    $votes = 0;
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $topic = $_POST["qtopic"];
    $content = $_POST["qcontent"];

    if (!$stmt -> bind_param("issss", $votes, $name, $email, $topic, $content)) {
        die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
    }



    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
    header("Location: index.php")

?>