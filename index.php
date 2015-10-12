<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Simple Stack Exchange</title>
	</head>
	<body>		
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>
		<form action="index.php" method="post">
			<input type="text" name="keyword">
			<input type="submit" value="Search">
			<p id=1>
				Can't find what you are looking for? <a href="ask.php?mode=0">Ask Here</a>
			</p>
		</form>	
		<H4>Recently Asked Questions</H4>
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
		if (count($_GET)>0) {		
			$sql = "Delete from answer where qid=".$_GET['a'];
			$conn->query($sql);
			$sql = "Delete from question where qid=".$_GET['a'];
			$conn->query($sql);
		}
		
		
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
			"</a> -Content: ".$row["content"]."
			<form action='ask.php?mode=1' method='post'>
				<input type='hidden' name='name' value='".$row["askname"]."'>
				<input type='hidden' name='qid' value='".$row["qid"]."'>
				<input type='hidden' name='mail' value='".$row["email"]."'>
				<input type='hidden' name='topic' value='".$row["topic"]."'>
				<input type='hidden' name='qcontent' value='".$row["content"]."'>				
				<button>Edit</button>
			</form>		
			<a href='index.php?a=".$row['qid']."'>				
				<button>Delete</button>
			</a>			
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
