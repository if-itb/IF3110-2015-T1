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
		
		// echo 'MySQL Connected successfully';
		$db_selected = mysqli_select_db($link, $dbname);
		if (!$db_selected) {
			die('Database not selected: ' . mysqli_error());
		}
	?>
	<head>
		<title>Simple StackExchange</title>
	</head>
	
	<body>
		<h1><a href="index.php">Simple StackExchange</a></h1>
		<p>Cannot find what you are looking for? <a href="question-form.php"> Ask here.</a></p>
		
		<?php
			$sql = "SELECT id, topic, votes, answers, name FROM " . $tablename;
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				echo "<table>";
				while ($row = mysqli_fetch_assoc($result)) {
					// echo $row["id"] . $row["topic"] . $row["votes"] . $row["answers"] . "<br>";
					echo "<tr>";
						echo "<td>";
							echo $row["votes"];
						echo "</td>";
						echo "<td>";
							echo $row["answers"];
						echo "</td>";
						echo '<td rowspan="2" width="60%">';
							echo '<a href="question-detail.php?id=' . $row["id"] . '">' . $row["topic"] . '</a>';
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "Votes";
						echo "</td>";
						echo "<td>";
							echo "Answers";
						echo "</td>";
						echo '<td rowspan="2">';
							$delete_hyperlink = 'href="question-delete.php?id=' . $row["id"] . '">';
							$edit_hyperlink = 'href="question-edit.php?id=' . $row["id"] . '">';
							echo "asked by " . $row["name"] . ' | <a ' . $edit_hyperlink . 'edit</a> | <a ' . $delete_hyperlink . 'delete</a>';
						echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
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
