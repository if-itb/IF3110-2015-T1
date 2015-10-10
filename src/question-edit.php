<html>
	<head>
		<title>Question Edit</title>
	</head>
	
	<body>
		<h1>Edit Question</h1>
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
			
			$sql = 'SELECT name, email, topic, content FROM ' . $tablename . ' WHERE id=' . $_GET["id"];
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
		?>
		<h3>You are currently editing question with ID <i><?php echo $_GET["id"] ?></i>.</h3>
		<form action="question-change.php?id=<?php echo $_GET["id"]; ?>" method="post">
			Name: &nbsp; <input type="text" name="name" /> <br />
			Email: &nbsp; <input type="text" name="email" /> <br />
			Question Topic: &nbsp; <input type="text" name="topic" /> <br />
			Content: &nbsp;<input type="text" name="content" /> <br />
			<input type="submit" value="Change" />
		</form>
	</body>
</html>
