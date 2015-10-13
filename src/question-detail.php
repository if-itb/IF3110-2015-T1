<!DOCTYPE html>
<html>
	<head>
		<title>Question Detail</title>
		<script src="js/script.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		
		
		<h1><a href="index.php">Simple StackExchange</a></h1>
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
			
			$sql = 'SELECT name, topic, content, answers, votes, reg_date FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			
			echo '<h2>' . $row["topic"] . '<hr /></h2>';
			
			echo '<table>';
				echo '<tr>';
					echo '<td>';
						echo '<button type="button" onclick="loadVote(' . $_GET["id"] . ', 1, 1)">UP</button>';
					echo '</td>';
					echo '<td rowspan="3">';
						echo $row["content"];
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>';
		?>
						</p>
						<p id="votequestion"><?php echo $row["votes"]; ?></p>
		<?php
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>';
						echo '<button type="button" onclick="loadVote(' . $_GET["id"] . ', 1, 2)">DN</button>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td colspan="2">';
						$delete_hyperlink = 'href="question-delete.php?id=' . $_GET["id"] . '" onclick="return confirmDelete()">';
						$edit_hyperlink = 'href="question-edit.php?id=' . $_GET["id"] . '">';
						echo 'asked by ' . $row["name"] . ' at ' . $row["reg_date"] . ' | <a ' . $edit_hyperlink . 'edit</a> | <a ' . $delete_hyperlink . 'delete</a>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
			
			echo '<br><br>';
			
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
				echo '<hr />';
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
							echo '<button type="button" onclick="loadVote(' . $row["id"] . ', 2, 1)">UP</button>';
						echo '</td>';
						echo '<td rowspan="3">';
							echo $row["content"];
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
		?>
						</p>
						<p id="voteanswer<?php echo $row["id"];  ?>"><?php echo $row["votes"]; ?></p>
		<?php
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							echo '<button type="button" onclick="loadVote(' . $row["id"] . ', 2, 2)">DN</button>';
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2">';
							echo 'asked by ' . $row["name"] . ' at ' . $row["reg_date"];
						echo '</td>';
					echo '</tr>';
					echo '<tr><td colspan="2"><hr /></td></tr>';
				}
				echo "</table>";
			}
			else {
				echo "Empty";
			}
			/////
		
		?>	
			<h2>Your Answer</h2>
			<form name="AnswerForm" action="answer-submit.php?id=<?php echo $_GET["id"]; ?>" onsubmit="return validateAnswerForm()" method="post">
				Name: &nbsp; <input type="text" name="name" /> <br />
				Email: &nbsp; <input type="text" name="email" /> <br />
				Content: &nbsp;<input type="text" name="content" /> <br />
				<!-- <input type="hidden" name="parent_id" value="<?php echo $_GET["id"]; ?>" /> -->
				<input type="submit" value="Post" />
			</form>
		<?php	
			mysql_close($link);
		?>
		
		<script>
			function loadVote(id, type, opt) {
			  var xhttp;
			  if (window.XMLHttpRequest) {
				// code for modern browsers
				xhttp = new XMLHttpRequest();
				} else {
				// code for IE6, IE5
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  if (type == 1) {
					document.getElementById("votequestion").innerHTML = xhttp.responseText;
				  }
				  else {
					document.getElementById("voteanswer"+id).innerHTML = xhttp.responseText;
				  }
				}
			  }
			  xhttp.open("GET", "question-answer-vote.php?id="+id+"&type="+type+"&opt="+opt, true);
			  xhttp.send();
			}
		</script>
		
	</body>
</html>
