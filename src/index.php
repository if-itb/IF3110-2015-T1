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
		<title>Simple StackExchange</title>
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		<p>Cannot find what you are looking for? <a href="question-form.php"> Ask here.</a></p>
		
		<?php
			$sql = "SELECT id, topic, votes, answers, name FROM " . $tablename;
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while ($row = mysqli_fetch_assoc($result)) {
					echo $row["id"] . $row["topic"] . $row["votes"] . $row["answers"] . "<br>";
				}
			}
			else {
				echo "Empty";
			}
		?>
	</body>
	<?php
		mysql_close($link);
	?>
</html>
