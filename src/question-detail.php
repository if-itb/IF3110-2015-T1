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
			
		?>
		<table>
		<?php
			
			echo '<tr>';
				echo '<td colspan="2"><h2 class="nameleft">' . $row["topic"] . '<hr /></h2></td>';
			echo '</tr>';
			
			
				echo '<tr>';
					echo '<td align="center" width="10">';
						echo '<button type="button" onclick="loadVote(' . $_GET["id"] . ', 1, 1)"><img src="images/ArrowUp.png" width="20px" height="20px"></button>';
					echo '</td>';
					echo '<td rowspan="3">';
						echo $row["content"];
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td width="10">';
		?>
						
						<p id="votequestion" align="center"><?php echo $row["votes"]; ?></p>
		<?php
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td align="center" width="10">';
						echo '<button type="button" onclick="loadVote(' . $_GET["id"] . ', 1, 2)"><img src="images/ArrowDown.png" width="20px" height="20px"></button>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td colspan="2" align="right">';
						$delete_hyperlink = 'href="question-delete.php?id=' . $_GET["id"] . '" onclick="return confirmDelete()">';
						$edit_hyperlink = 'href="question-edit.php?id=' . $_GET["id"] . '">';
						echo 'asked by <b><font color="purple">' . $row["name"] . '</font></b> at <b><font color="blue">' . $row["reg_date"] . '</font></b> | <a ' . $edit_hyperlink . '<font color="orange"><b>edit</b></font></a> | <a ' . $delete_hyperlink . '<font color="red"><b>delete</b></font></a>';
					echo '</td>';
				echo '</tr>';
			// echo '</table>';
			
			// Answers
			// echo '<table>';
			echo '<tr><td colspan="2"><h2 class="nameleft">';
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
				// echo '<hr />';
			}
			echo '<hr /></h2></td></tr>';
			
			/////
			$sql = "SELECT id, votes, name, content, reg_date FROM " . $anstabname . ' WHERE parent_id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				
				while ($row = mysqli_fetch_assoc($result)) {
					// echo $row["id"] . $row["topic"] . $row["votes"] . $row["answers"] . "<br>";
					echo '<tr>';
						echo '<td align="center" width="10">';
							echo '<button type="button" onclick="loadVote(' . $row["id"] . ', 2, 1)"><img src="images/ArrowUp.png" width="20px" height="20px"></button>';
						echo '</td>';
						echo '<td rowspan="3">';
							echo $row["content"];
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td width="10">';
		?>
						</p>
						<p align="center" id="voteanswer<?php echo $row["id"];  ?>"><?php echo $row["votes"]; ?></p>
		<?php
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td align="center" width="10">';
							echo '<button type="button" onclick="loadVote(' . $row["id"] . ', 2, 2)"><img src="images/ArrowDown.png" width="20px" height="20px"></button>';
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2" align="right">';
							echo 'answered by <b><font color="green">' . $row["name"] . '</b></font> at <b><font color="blue">' . $row["reg_date"] . '</b></font>';
						echo '</td>';
					echo '</tr>';
					echo '<tr><td colspan="2"><hr /></td></tr>';
				}
				
			}
			else {
				echo '<tr><td colspan="2">Empty records.</td></tr>';
			}
			// echo '</table>';
			/////
		
		?>
		</table>
		<table class="tableform">
			<!-- <table> -->
				<tr><td><h2>Your Answer</h2></td></tr>
				<form name="AnswerForm" action="answer-submit.php?id=<?php echo $_GET["id"]; ?>" onsubmit="return validateAnswerForm()" method="post">
					<tr><td><input type="text" name="name" class="textbox" value="Name" onfocus="inputFocus(this)" onblur="inputBlur(this)" /></td></tr>
					<tr><td><input type="text" name="email" class="textbox" value="Email" onfocus="inputFocus(this)" onblur="inputBlur(this)" /></td></tr>
					<tr><td><textarea name="content" rows="5" class="textareascroll" placeholder="Content"></textarea></td></tr>
					<tr><td align="right"><input type="submit" value="Post" /></td></tr>
				</form>
			<!-- </table> -->
		<?php	
			mysql_close($link);
		?>
			
		</table>
		
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
		<br><br><br><br><br>
	</body>
</html>
