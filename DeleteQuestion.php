<?php
    function Redirect($url, $permanent = false)
    {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
    }

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
        echo"$id";
        $sql = "DELETE FROM Answers WHERE A_ID='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $sql = "DELETE FROM Questions WHERE ID='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }
    Redirect('index.php', false);
?>