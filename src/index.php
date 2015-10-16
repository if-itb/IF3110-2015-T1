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
		<script src="js/script.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<h1><a href="index.php">Simple StackExchange</a></h1>
		<form align="center" name="searchBox" action="index.php" method="get">
			<input type="text" name="search" id="searchtextbox" />
			<input type="submit" value="Search" />
		</form>
		<p align="center">Cannot find what you are looking for? <a href="question-form.php"> <font color="orange"><b>Ask here</b>.</font></a></p>
		
		<br><br>
		
		<table>
			<tr>
				<td colspan="3">
					<h2 class="nameleft">
						<?php
							if ($_GET) {
								echo 'Search Results';
							}
							else {
								echo 'Recently Asked Questions';
							}
						?>
						<hr />
					</h2>
				</td>
			</tr>
			<?php
				if ($_GET) {
					$sql = "SELECT * FROM " . $tablename . " WHERE (topic LIKE '%" . $_GET['search'] . "%') OR (content LIKE '%" . $_GET['search'] . "%')";
				}
				else {
					$sql = "SELECT * FROM " . $tablename;
				}
				
				$result = mysqli_query($link, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					// echo "<table>";
					while ($row = mysqli_fetch_assoc($result)) {
						// echo $row["id"] . $row["topic"] . $row["votes"] . $row["answers"] . "<br>";
						echo "<tr>";
							echo "<td><center>";
								echo $row["votes"];
							echo "</center></td>";
							echo "<td><center>";
								echo $row["answers"];
							echo "</center></td>";
							echo '<td width="80%">';
								$substring = substr($row["topic"], 0, 50);
								if (strlen($row["topic"]) > 50) {
									$substring .= '...';
								}
								echo '<a href="question-detail.php?id=' . $row["id"] . '">' . $substring . '</a>';
							echo "</td>";
							
						echo "</tr>";
						echo "<tr>";
							echo '<td align="center">';
								echo "Votes";
							echo "</td>";
							echo '<td align="center">';
								echo "Answers";
							echo "</td>";
							echo '<td width="80%">';
								$substring = substr($row["content"], 0, 50);
								if (strlen($row["content"]) > 50) {
									$substring .= '...';
								}
								echo '<a href="question-detail.php?id=' . $row["id"] . '"><font color="darkorange"><i>' . $substring . '</i></font></a>';
							echo "</td>";
						echo "</tr>";
						echo '<tr><td colspan="3" align="right">';
							$delete_hyperlink = 'href="question-delete.php?id=' . $row["id"] . '" onclick="return confirmDelete()">';
							$edit_hyperlink = 'href="question-edit.php?id=' . $row["id"] . '">';
							echo 'asked by <b><font color="purple">' . $row["email"] . '</font></b> | <a ' . $edit_hyperlink . '<font color="orange"><b>edit</b></font></a> | <a ' . $delete_hyperlink . '<font color="red"><b>delete</b></font></a>';
						echo "</td></tr>";
						echo '<tr><td colspan="3"><hr /></td></tr>';
					}
					// echo "</table>";
				}
				else {
					echo '<tr>';
						echo "<td><i>Empty Question</i></td>";
					echo '</tr>';
				}
			?>
		</table>
		<br><br><br><br><br>
	</body>
	<?php
		mysql_close($link);
	?>
</html>
