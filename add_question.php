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
		$id = $_POST["id"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		if ($id == 0) {
			$sql = "INSERT INTO pertanyaan (Nama, Email, Topik, Konten)
			VALUES ('$name', '$email', '$topic', '$content')";
		} else {
			$sql = "UPDATE pertanyaan SET Nama='$name', Email='$email', Topik='$topic', Konten='$content'
			WHERE ID = '$id'";
		}

		mysqli_query($conn, $sql);
		mysqli_close($conn);
	?>
</body>
</html>