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
		$result = mysqli_query($conn, $addVote);

		$output = "SELECT VOTE from $table WHERE ID = '$id'";
		$result = mysqli_query($conn, $output);
		while ($row = mysqli_fetch_assoc($result)){
			echo $row["VOTE"];
		}

		mysqli_close($conn);
	?>
