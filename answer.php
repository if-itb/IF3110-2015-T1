<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
	</head>
	<body>
		<H2>SIMPLE STACK EXCHANGE</H2>	
		<?php
		$qid = $_GET['id'];

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
		//Fetch Question
		$sql =  "select * from question where qid=".$qid;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$topic = $row['topic'];
		$askname = $row['askname'];
		$vote = $row['vote'];
		$mail = $row['email'];
		$qcon = $row['content'];
		?>
		
		<H5><?php echo $topic;?></H5>
		<p> Vote = <?php echo $vote;?> </p>
		<p> <?php echo $qcon;?></p>
		<p>asked by <?php echo $askname;?> | edit | delete </p>
		
		<H4>Your Answer</H4>
		
		<form action="answered.php?id=<?php echo $qid;?>" method="post">
		<input type="text" name="name"><br>
		<input type="text" name="mail"><br>		
		<textarea name="acontent" cols=50 rows=5></textarea><br>
		<input type="submit" value="Post">
		</form> 
		
		
	</body>
</html>
