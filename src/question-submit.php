<html>
	<?php
		$servername = "localhost";
		$username = "webuser";
		$password = "webpass";
		$dbname = "simple_stackexchange";
		$tablename = "Question";
		
		// Create connection
		$link = mysqli_connect($servername, $username, $password);
		
		if (!$link) {
			die('Could not connect: ' . mysqli_error());
		}
		
		echo 'MySQL Connected successfully';
		$db_selected = mysqli_select_db($link, $dbname);
		if (!$db_selected) {
			die('Database not selected: ' . mysqli_error());
		}
	?>
	<head>
		<title>Question Submit</title>
	</head>
	
	<body>
		<?php
			$sql = "INSERT INTO " . $tablename . " (name, email, topic, content) VALUES (" . "'" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["topic"] . "', '" . $_POST["content"] . "')";
			
			if (mysqli_query($link, $sql)) {
				echo "New question created successfully";
				header("Location: index.php");
				exit;
			}
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($link);
			}
		?>
	</body>
	<?php
		mysql_close($link);
	?>
</html>
