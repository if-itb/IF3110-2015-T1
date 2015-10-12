<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
	</head>
	<body>
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>
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
		$name = $row['askname'];
		$vote = $row['vote'];
		$mail = $row['email'];
		$con = $row['content'];
		?>		
		<H4><?php echo $topic;?></H4>		
		<p> <?php echo $con;?></p>
		<p>vote =<?php echo $vote;?> | asked by <?php echo $name;?> | edit | delete </p>
			
		<?php
		$sql = "select * from answer where qid=".$qid;
		$result = mysqli_query($conn, $sql);
		echo "<H4>".mysqli_num_rows($result)." Answers</H4>";
		while ($row = mysqli_fetch_assoc($result)) {
			$name = $row['ansname'];
			$vote = $row['vote'];
			$mail = $row['email'];
			$con = $row['content'];
			echo "-------------------------<br><p>$con</p>";
			echo "vote = ".$vote." | answered by ".$name."<br><br>";		
		}
		
		
		
		?>
		<H4>Your Answer</H4>
		
		<form action="answered.php?id=<?php echo $qid;?>" method="post">
		<input type="text" name="name"><br>
		<input type="text" name="mail"><br>		
		<textarea name="acontent" cols=50 rows=5></textarea><br>
		<input type="submit" value="Post">
		</form> 
		
		<?php mysqli_close($conn); ?>
	</body>
</html>
