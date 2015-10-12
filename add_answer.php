<!DOCTYPE html>
<html>
<head>
	<title>Ask</title>
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

		if (mysqli_query($conn, $sql)) {
		    //"New record created successfully";
		} else {
		    //"Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		$addAnswer = "UPDATE pertanyaan SET Jmlh_Jawaban = Jmlh_Jawaban+1 WHERE ID = '$qid'";

		if (mysqli_query($conn, $addAnswer)) {
		    //"New record created successfully";
		} else {
		    //"Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	?>
</body>
</html>