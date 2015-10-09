<html>
<head>
	<meta http-equiv="refresh" content="0; URL='home.php'" />
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "StackExchange";
		
		$qid = $_GET["qid"];
		
		//Membuat koneksi
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		//Cek koneksi
		if (!$conn) {
			die("Connection failed : ". mysqli_connect_error());
		}
		
		$sql = "DELETE FROM question WHERE qid='$qid'";
		
		if (mysqli_query($conn, $sql)) {
			//Sukses
		} else {
			//error
		}
		
		mysqli_close($conn);
	?>
</body>
</html>