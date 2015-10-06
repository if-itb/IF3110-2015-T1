<html>
	<?php
		$servername = "localhost";
		$username = "webuser";
		$password = "webpass";
		$dbname = "Question";
		
		// Create connection
		$link = mysql_connect($servername, $username, $password);
		
		if (!$link) {
			die('Could not connect: ' . mysql_error());
		}
		
		echo 'MySQL Connected successfully';
		mysql_select_db(dbname, $link);
	?>
	<head>
		<title>Simple StackExchange</title>
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		<p>Cannot find what you are looking for? <a href="question-form.php"> Ask here.</a></p>
		
		<?php
			$sql = "SELECT id, topic, votes, answers, name FROM Question";
			$result = mysql_query($link, $sql);
			
			if (mysql_num_rows($result) > 0) {
				// output data of each row
				while ($row = mysql_fetch_assoc($result)) {
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
