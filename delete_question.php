<?php

			$dbname = "stackexchange";
            $host = "localhost";
            $username = "root";
            $password = "810f810m";

            $conn = mysqli_connect($host, $username, $password, $dbname);
            mysql_select_db('stackexchange');

            $query =    "SELECT questionID, email, question_topic, content, vote, answer FROM question";

            $result = mysqli_query($conn, $query);
                
    
            if (! $result) {
                die('Gagal ambil data: '.mysql_error());
            }

            $id = $_GET["id"];
			$sql = "DELETE FROM answer WHERE questionID=$id";
			$result = mysqli_query($conn, $sql);

			$sql = "DELETE FROM question WHERE questionID=$id";
			$result = mysqli_query($conn, $sql);
	
			header("Location: index.php");
    		exit;

?>
