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
			echo "
			<div id='main'>			
			<hr width=80%>
			<div class='lbox'>
			<span class='vanum'>".$row['vote']." $ans</span><br>
			<span class='va'>Votes Answers</span>			
			</div>
			<div class='topcon'>
			<a id='qtopic' href='answer.php?id=".$row['qid']."'>".$row["topic"]."</a>
			<br>".$row["content"]."<br>
			</div>
			
			<div class='usinfo'>
			asked by <p id='blue'>" . $row["askname"]. " [" . $row["email"]."]</p> <b>&nbsp&nbsp|&nbsp&nbsp</b>
			<form action='ask.php?mode=1' method='post'>
 				<input type='hidden' name='name' value='".$row["askname"]."'>
 				<input type='hidden' name='qid' value='".$row["qid"]."'>
 				<input type='hidden' name='mail' value='".$row["email"]."'>
 				<input type='hidden' name='topic' value='".$row["topic"]."'>
 				<input type='hidden' name='qcontent' value='".$row["content"]."'>				
				<button id='edit'>Edit</button>
			</form> <b>&nbsp&nbsp|&nbsp&nbsp</b>
			<button id='del' onclick='del(".$row['qid'].",\"".$row['topic']."\",\"".$row['askname']."\")'>Delete</button>		
			</div>
			<div>
			
			";
		    }
		} else {
		    echo "<div class='empty'>No question has ben asked recently</div>";
		}
		
		mysqli_close($conn);
		?>	


	</body>
</html>
