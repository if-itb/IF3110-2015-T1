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
		
		$sql = "Delete from answer where qid=".$id;
		$conn->query($sql);
		$sql = "Delete from question where qid=".$id;
		$conn->query($sql);
		
		
		
		mysqli_close($conn);
		?>	


	</body>
</html>
