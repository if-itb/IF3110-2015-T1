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
			$anstabname = "Answer";
			
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
			
			$sql = 'SELECT topic, content, answers, votes, reg_date FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			
			echo '<h2>' . $row["topic"] . '</h2>';
			echo '<h2>';
			
			echo '<table>';
				echo '<tr>';
					echo '<td>';
						echo "UP";
					echo '</td>';
					echo '<td rowspan="3">';
						echo $row["content"];
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>';
						echo $row["votes"];
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>';
						echo "DOWN";
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td colspan="2">';
						$delete_hyperlink = 'href="question-delete.php?id=' . $_GET["id"] . '">';
						$edit_hyperlink = 'href="question-edit.php?id=' . $_GET["id"] . '">';
						echo 'asked by ' . $row["name"] . ' at ' . $row["reg_date"] . ' | <a ' . $edit_hyperlink . 'edit</a> | <a ' . $delete_hyperlink . 'delete</a>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
			
			echo '<br><br>';
			
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
			
			/////
			$sql = "SELECT id, votes, name, content, reg_date FROM " . $anstabname . ' WHERE parent_id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				echo "<table>";
				while ($row = mysqli_fetch_assoc($result)) {
					// echo $row["id"] . $row["topic"] . $row["votes"] . $row["answers"] . "<br>";
					echo '<tr>';
						echo '<td>';
							echo "UP";
						echo '</td>';
						echo '<td rowspan="3">';
							echo $row["content"];
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							echo $row["votes"];
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							echo "DOWN";
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2">';
							echo 'asked by ' . $row["name"] . ' at ' . $row["reg_date"];
						echo '</td>';
					echo '</tr>';
				}
				echo "</table>";
			}
			else {
				echo "Empty";
			}
			/////
		
		?>	
			<h2>Your Answer</h2>
			<form action="answer-submit.php?id=<?php echo $_GET["id"]; ?>" method="post">
				Name: &nbsp; <input type="text" name="name" /> <br />
				Email: &nbsp; <input type="text" name="email" /> <br />
				Content: &nbsp;<input type="text" name="content" /> <br />
				<!-- <input type="hidden" name="parent_id" value="<?php echo $_GET["id"]; ?>" /> -->
				<input type="submit" value="Post" />
			</form>
		<?php	
			mysql_close($link);
		?>
	</body>
</html>
