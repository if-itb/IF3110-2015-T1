<?php

	    $dbname = "stackexchange";
            $host = "localhost";
            $username = "root";
            $password = "810f810m";

            $conn = mysqli_connect($host, $username, $password, $dbname);
            mysql_select_db('stackexchange');


            $id = $_GET["id"];
            $sql = "UPDATE question SET vote = vote+1 WHERE questionID='$id'";
            $result = mysqli_query($conn, $sql);
    
            $sql = "SELECT vote FROM question where questionID='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0)
                echo $row['vote'];
            exit;

?>
