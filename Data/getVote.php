<?php
    if (isset($_GET['id'])){
        $username = 'root';
        $password = '';
        $database = 'stackex';
        $conn = new mysqli('localhost', $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_GET["id"];
        $question = $_GET["q"];
        $v = $_GET["v"];

        if($question=='true'){
            $sql = "SELECT * FROM Questions WHERE id=$id";
        }
        else{
            $sql = "SELECT * FROM Answers WHERE id=$id";
        }
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $vote = $row['vote'];

        if($v=='up'){
            $vote=$vote+1;
        }
        else{
            $vote=$vote-1;
        }
        echo"$vote";

        if($question=='true'){
            $sql = "UPDATE questions SET vote = $vote WHERE id=$id";
        }
        else{
            $sql = "UPDATE answers SET vote = $vote WHERE id=$id";
        }
        if ($conn->query($sql) === TRUE) {
            //nothing. YAyy correct
        }
        else{
            //echo "Yahh.. gagal";
        }
        $conn->close();
    }
?>
