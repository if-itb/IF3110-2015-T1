<!DOCTYPE html>
<html>
<head>
	<title>Add Question</title>
	<meta http-equiv="refresh" content="0; URL='home.php'">
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";
		$name = $_POST["nama"];
		$email = $_POST["email"];
		$topic = $_POST["topik"];
		$content = $_POST["konten"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO pertanyaan (Nama, Email, Topik, Konten)
		VALUES ('$name', '$email', '$topic', '$content')";

		if (mysqli_query($conn, $sql)) {
		    //"New record created successfully";
		} else {
		    //"Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	?>
</body>
</html>