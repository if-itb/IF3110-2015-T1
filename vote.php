<?php
    require_once "db.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["action"]) &&
        !empty($_GET["type"]) && !empty($_GET["id"])) {
        $id = $mysqli->real_escape_string($_GET["id"]);
        $table = $mysqli->real_escape_string($_GET["type"]);
        $query = "SELECT vote FROM ". $table ." WHERE id='". $id ."'";
        $result = $mysqli->query($query);
        if ($row = $result->fetch_assoc()) {
            $delta = 0;
            if ($_GET["action"] == "up") $delta = 1;
            else if ($_GET["action"] == "down") $delta = -1;
            $query = "UPDATE ". $table ." SET vote='". ($row["vote"] + $delta) ."' WHERE id='". $id ."'";
            $mysqli->query($query);
            $query = "SELECT vote FROM ". $table ." WHERE id='". $id ."'";
            if ($row = $mysqli->query($query)->fetch_assoc())
                echo $row["vote"];
        }
    }
    $mysqli->close();
?>
