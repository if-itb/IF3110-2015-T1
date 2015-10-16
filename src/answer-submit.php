<html>
	<?php
		$servername = "localhost";
		$username = "webuser";
		$password = "webpass";
		$dbname = "simple_stackexchange";
		$tablename = "Question";
		$anstabname = "Answer";
		
		// Create connection
		$link = mysqli_connect($servername, $username, $password);
		
		if (!$link) {
			die('Could not connect: ' . mysqli_error());
		}
		
		// echo 'MySQL Connected successfully';
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
			$sqlretrieve = 'SELECT answers FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			$retrieveresult = mysqli_query($link, $sqlretrieve);
			$retrieverow = mysqli_fetch_assoc($retrieveresult);
			
			echo $retrieverow["answers"];
			
			$newansnumber = 1 + $retrieverow["answers"];
			echo $newansnumber;
			$sqladdans = 'UPDATE ' . $tablename . ' SET answers=' . $newansnumber . ' WHERE id=' . $_GET["id"];
			if (mysqli_query($link, $sqladdans)) {
				echo "Updated vote number successfully";
			}
			else {
				echo "Error: " . $sqladdans . "<br>" . mysqli_error($link);
			}
			
			$anssql = "INSERT INTO " . $anstabname . " (parent_id, name, email, content, votes) VALUES (" . "'" . $_GET["id"] . "', '" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["content"] . "', 0)";
			if (mysqli_query($link, $anssql)) {
				echo "New answer created successfully";
				header("Location: index.php");
				exit;
			}
			else {
				echo "Error: " . $anssql . "<br>" . mysqli_error($link);
			}
		?>
	</body>
	<?php
		mysql_close($link);
	?>
</html>
