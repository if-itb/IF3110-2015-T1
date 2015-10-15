<!DOCTYPE html>
<html>
<head>
	<title>Vote</title>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";
		$table = $_GET["vote"];
		$poin = $_GET["poin"];
		$id = $_GET["id"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$addVote = "UPDATE $table SET Vote=Vote+'$poin' WHERE ID = '$id'";

		if (mysqli_query($conn, $addVote)) {
		    //"New record created successfully";
		} else {
		    //"Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	?>
</body>
</html>