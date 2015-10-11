<!DOCTYPE html>
<html>
<head>
	<title>Answer a Question</title>
</head>

<body>
	<h1 align="center"> Simple StackExchange</h1>
	<br>
	<br>
	<?php
		$question_id = intval($_GET['question_id']);
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);
		$sql = "SELECT * FROM question WHERE id=$question_id";
		$question = mysql_fetch_assoc(mysql_query($sql));
	?>
	<h3 align="center"><?php echo $question['topic']; ?></h3>
	<hr width="75%" align="center">

	<div align="center">
		<p>
			<?php echo $question['content']; ?>
		</p>
		<br>
		asked by <?php echo $question['email']; ?>
		| <a href="create.php?question_id=<?php echo $question_id; ?>">edit</a> | delete
	</div>

	<br>
	
	<div align="center">
		<h3>
			<?php
				$answer_count_sql = "SELECT count(id) as c FROM answer WHERE question_id=$question_id";
				$answer_count = mysql_fetch_assoc(mysql_query($answer_count_sql));
				echo $answer_count['c'];
			?> answer(s)
		</h3>
		<hr width="75%">
		<?php
			$answers = "SELECT * FROM answer WHERE question_id=$question_id";
			$result = mysql_query($answers);
		?>
		<?php while($row = mysql_fetch_assoc($result)) { ?>
			<p><?php echo $row['content']; ?></p>
			answered by <?php echo $row['email']; ?>
		<br>
		<hr width="75%">
		<?php } ?>
	</div>

	<br>

	<div align="center">
		<h3>Your Answer</h3>
		<form action="home.php" method="POST">
			<input type="text" name="name" placeholder="Name">
			<br>
			<input type="text" name="email" placeholder="Email">
			<br>
			<textarea name="content" placeholder="Content" rows="5"></textarea>
			<br>
			<input type="submit" value="Post">
			<input type="hidden" name="type" value="answer">
			<input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
		</form>
	<?php mysql_close($conn) ?>
</body>
</html>