<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sse";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Post failed, please resubmit your question.");
		}
		
			//SQL Query		
		$sql ="select * from question";
		$result = mysqli_query($conn, $sql);
		
		
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
			$sql = "select * from answer where qid=".$row['qid'];
			$aresult = mysqli_query($conn, $sql);
			$ans = mysqli_num_rows($aresult);
			echo "Votes: ".$row['vote']." -Answers: $ans -Name: " . $row["askname"]. " -Email: " . $row["email"]. 
			" -Topic: <a href='answer.php?id=".$row['qid']."'>"
			.$row["topic"].
			"</a> -Content: ".$row["content"]."<br>
			<button>Edit</button>						
			<button onclick='del(".$row['qid'].",\"".$row['topic']."\",\"".$row['askname']."\")'>Delete</button>		
			<br><br>
			";
		    }
		} else {
		    echo "No question has ben asked recently";
		}
		
		mysqli_close($conn);
		?>	


	</body>
</html>
