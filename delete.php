<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<meta http-equiv="refresh" content="0; URL='home.php'">
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";
		$id = $_GET["ID"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$delete_question = "DELETE FROM pertanyaan WHERE ID='$id'";
		mysqli_query($conn, $delete_question);

		$delete_answer = "DELETE FROM jawaban WHERE Pertanyaan_ID='$id'";
		mysqli_query($conn, $delete_answer);
		
		mysqli_close($conn);
	?>
</body>
</html>