<html>
	<head>
		<title>Question Edit</title>
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
			
			$sql = 'SELECT name, email, topic, content FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
		?>
		<table class="tableform">
			<tr><td colspan="2"><h3>You are currently editing question with ID <i><?php echo $_GET["id"] ?></i>.<hr /></h3></td></tr>
			<tr><td colspan="2"><p><em><font color="darkred">N.B. Name and email address cannot be modified.</font></em></p><br><br></td></tr>
			<form name="QuestionForm" action="question-change.php?id=<?php echo $_GET["id"]; ?>" onsubmit="return validateQuestionForm()" method="post">
				<tr>
					<td><input type="text" name="namex" value="<?php echo $row["name"]; ?>" disabled="disabled" class="textbox" /></td>
				</tr>
				
				<tr>
					<td><input type="text" name="emailx" value="<?php echo $row["email"]; ?>" disabled="disabled" class="textbox" /></td>
				</tr>
				
				
				<tr>
					<td><input type="text" name="topic" value="<?php echo $row["topic"]; ?>" class="textbox" /></td>
				</tr>
				
				<tr>
					<td><textarea name="content" rows="5" class="textareascroll"><?php echo $row["content"]; ?></textarea></td>
				</tr>
				
				<tr><td colspan="2" align="right"><input type="submit" value="Change" /></td></tr>
				
				<input type="hidden" name="name" value="<?php echo $row["name"]; ?>" />
				<input type="hidden" name="email" value="<?php echo $row["email"]; ?>" />
			</form>
		</table>
		<br><br><br><br><br>
	</body>
</html>
