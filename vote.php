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
		
		$id = $_GET['id'];
		$mode = $_GET['mode'];
		
		if ($mode==1 or $mode==2) {
			if ($mode==1)
				$delta=1;
			else
				$delta=-1;
			$sql = "select vote from question where qid=".$id;
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$vote = $row['vote'] + $delta;			
			$sql = "update question set vote =".$vote." where qid=".$id;
			$conn->query($sql);
		} else	{
			if ($mode==3)
				$delta=1;
			else
				$delta=-1;
			$sql = "select vote from answer where aid=".$id;
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$vote = $row['vote'] + $delta;	
			$sql = "update answer set vote =".$vote." where aid=".$id;	
			$conn->query($sql);
		
		}
		
		
		echo $vote;
		
		
		
		mysqli_close($conn);
		?>	


	</body>
</html>
