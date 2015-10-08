<?php
    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    if( $_SERVER['REQUEST_METHOD']=='POST'){
        $username = 'root';
        $password = '';
        $database = 'stackex';
        $conn = new mysqli('localhost', $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $name = $_POST["name"];
        $email = $_POST["email"];
        $content = $_POST["content"];
        $A_ID = $_POST["A_ID"];
        //echo "$name $email $A_ID $content";
        $sql = "INSERT INTO answers(A_ID,content, author, vote, email)
                            VALUES('$A_ID','$content','$name',0,'$email')";
        if ($conn->query($sql) === TRUE) {
            //nothing. YAyy correct
            echo "yay";
        }
        $conn->close();
    }
    $last_visited = $_SERVER['HTTP_REFERER'];
    Redirect($last_visited, false);
?>