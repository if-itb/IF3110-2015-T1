<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "stckxchg";
            $password = "";
            $dbname = "stackExchange";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error . "<br>");
            }
            
            $retrieve_all = "SELECT name, email, topic, content FROM questions";
            $result = $conn->query($retrieve_all);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Name: " . $row["name"]. "<br> - E-mail: " . $row["email"]. "<br> - Topic:  " . $row["topic"]. "<br> - Content:  " . $row["content"]. "<br>";
                }
            } else {
                echo "0 results";
            }
                        
            $conn->close();
        ?>
    </body>
</html>
