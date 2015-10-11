<!DOCTYPE html>
<html>
<head>
	<title>
		What's your Question?
	</title>
</head>

<body>
	<?php
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);

		if (isset($_GET['question_id'])) {
			$question_id = $_GET['question_id'];
			$type = 'update';
		}
		else {
			$question_id = '';
			$type = 'ask';
		}

		$sql = "SELECT * FROM question where id=$question_id";
		$data = mysql_fetch_assoc(mysql_query($sql));
		$data['name'] = !isset($data['name']) ? '' : $data['name'];
		$data['email'] = !isset($data['email']) ? '' : $data['email'];
		$data['topic'] = !isset($data['topic']) ? '' : $data['topic'];
		$data['content'] = !isset($data['content']) ? '' : $data['content'];
	?>
	<h1 align="center">
		Simple StackExchange
	</h1>
	<br>
	<br>
	<h2 align="center">
		What's your question?
	</h2>
	<hr width="75%" align="center">
	<br>
	<form action="home.php" method="POST">
		<input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Name">
		<br>
		<input type="text" name="email" value="<?php echo $data['email']; ?>" placeholder="Email">
		<br>
		<input type="text" name="topic" value="<?php echo $data['topic']; ?>" placeholder="Question Topic">
		<br>
		<textarea name="content" placeholder="Content" rows="5"><?php echo $data['content']; ?></textarea>
		<br>
		<input type="hidden" name="type" value="<?php echo $type; ?>">
		<input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
		<input type="submit" name="post" value="Post">
	</form>
	<?php mysql_close($conn); ?>
</body>
</html>