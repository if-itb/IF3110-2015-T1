<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
	</head>
	<body>
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sse";
		$qid = $_GET['id'];
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Post failed, please resubmit your question.");
		}	
		//SQL Query
		$val = "'".$qid."','".$_POST['name']."','".$_POST['mail']."','".$_POST['acontent']."'";
		
		$sql = "insert into answer (qid, ansname, email, content)
		values (".$val.")";
		
		if (mysqli_query($conn, $sql)) {
		    echo "Your answer has been posted succesfully!";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
		mysqli_close($conn);
		?>	
	</body>
</html>
