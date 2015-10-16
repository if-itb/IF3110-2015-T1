<html>
	<head>
		<title>Question Vote Up</title>
	</head>
	<body>
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
			
			$db_selected = mysqli_select_db($link, $dbname);
			if (!$db_selected) {
				die('Database not selected: ' . mysqli_error());
			}
			
			///// VOTE
			if ($_GET["type"] == 1) {
				$sqlretrieve = 'SELECT votes FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			}
			else {
				$sqlretrieve = 'SELECT votes FROM ' . $anstabname . ' WHERE id=' . $_GET["id"];
			}
			
			$retrieveresult = mysqli_query($link, $sqlretrieve);
			$retrieverow = mysqli_fetch_assoc($retrieveresult);
			
			if ($_GET["opt"] == 1) {
				$newvotenumber = 1 + $retrieverow["votes"];
			}
			else {
				$newvotenumber = -1 + $retrieverow["votes"];
			}
			
			echo $newvotenumber;
			if ($_GET["type"] == 1) { // Question Vote
				$sqladdvote = 'UPDATE ' . $tablename . ' SET votes=' . $newvotenumber . ' WHERE id=' . $_GET["id"];
			}
			else { // Answer Vote
				$sqladdvote = 'UPDATE ' . $anstabname . ' SET votes=' . $newvotenumber . ' WHERE id=' . $_GET["id"];
			}
			
			if (mysqli_query($link, $sqladdvote)) {
				// echo "Updated vote number successfully";
			}
			else {
				echo "Error: " . $sqladdvote . "<br>" . mysqli_error($link);
			}
			
			/////
			
			mysql_close($link);
		?>
	</body>
</html>
