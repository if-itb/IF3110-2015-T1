<!DOCTYPE html>
<html>
<head>
	<title>Add Answer</title>
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
		$qid = $_POST["q_id"];
		$content = $_POST["konten"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO jawaban (Pertanyaan_ID, Nama, Email, Konten)
		VALUES ('$qid', '$name', '$email', '$content')";
		mysqli_query($conn, $sql);

		$addAnswer = "UPDATE pertanyaan SET Jmlh_Jawaban = Jmlh_Jawaban+1 WHERE ID = '$qid'";
		mysqli_query($conn, $addAnswer);

		mysqli_close($conn);
	?>
</body>
</html>