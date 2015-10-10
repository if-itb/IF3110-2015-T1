<html>
	<head>
		<title>Question Detail</title>
	</head>
	<body>
		<h1>Simple StackExchange</h1>
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
			
			$sql = 'SELECT topic, content, answers, votes FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			
			echo '<h2>' . $row["topic"] . '</h2>';
			echo '<h2>';
			if ($row["answers"] == 0) {
				echo "No Answer";
			}
			else {
				echo $row["answers"];
				if ($row["answers"] == 1) {
					echo " Answer";
				}
				else {
					echo " Answers";
				}
			}
			echo '</h2>';
			
			mysql_close($link);
		?>
	</body>
</html>
