<?php

			$dbname = "stackexchange";
            $host = "localhost";
            $username = "root";
            $password = "810f810m";

            $conn = mysqli_connect($host, $username, $password, $dbname);
            mysql_select_db('stackexchange');


			$id = $_REQUEST["id"];
			$sql = "UPDATE answer SET vote = vote+1 WHERE answerID='$id'";
			$result = mysqli_query($conn, $sql);

			$sql = "SELECT vote FROM answer where answerID='$id'";
			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_assoc($result);
			if (mysqli_num_rows($result) > 0)
				echo $row['vote'];
			exit;
?>
