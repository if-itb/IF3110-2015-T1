<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
	</head>
	<body>
		<H2>SIMPLE STACK EXCHANGE</H2>	
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

		$val = "'".$_POST['name']."','".$_POST['mail']."','".$_POST['topic']."','".$_POST['qcontent']."'";
		
		$sql = "insert into question (askname, email, topic, content)
		values (".$val.")";
		
		if (mysqli_query($conn, $sql)) {
		    echo "Your question has been posted succesfully!";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
		mysqli_close($conn);
		?>	
	</body>
</html>
