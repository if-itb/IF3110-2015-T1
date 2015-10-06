<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT Topic, Content, Vote, Author, Date FROM question ORDER BY Date DESC";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
			// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class= "asked-question">';
				echo '<div class= "vote-question">';
					echo "" . $row["Vote"]."<br>";
					echo "Vote" ;
				echo "</div>";
				echo '<div class= "answer-question">';
					echo "" . $row["Topic"]."<br>";
					echo "Answer";
				echo "</div>";
				echo '<div class= "question">';
					echo "" . $row["Topic"]."<br>";
					echo "" . $row["Content"];
				echo "</div>";			
				echo '<div class= "modif-question">';
					echo "asked by " . $row["Author"] . "|<a href='#'>| edit |</a> ". "<a href='#'>| delete |</a>";
				echo "</div>";	
			echo "</div>";

		}
	}
	else{
		
	}
	

?>