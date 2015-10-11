<!DOCTYPE html>
<html>
<head>
	<title>
		Simple Stack Exchange
	</title>
</head>

<body>
	<h1 align="center">Simple Stack Exchange</h1>
	<br>
	<br>
	<h3 align="center">Cannot find what you are looking for? <a href="create.php">Ask here</a></h3>
	<h3 align="center">Recently Asked Questions</h3>
	<hr width="75%" align="center">
	<?php
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);

		if ($_POST['type'] == 'ask') {
			$insert = "INSERT INTO question (name, email, topic, content) VALUES (
				'".$_POST["name"]."',
				'".$_POST["email"]."',
				'".$_POST["topic"]."',
				'".$_POST["content"]."'
			)";
			mysql_query($insert);
		}
		else if ($_POST['type'] == 'update') {
			$update = "UPDATE
							question
						SET
							name='".$_POST["name"]."',
							email='".$_POST['email']."',
							topic='".$_POST['topic']."',
							content='".$_POST['content']."'
						WHERE
							id='".$_POST['question_id']."'";
			mysql_query($update);
		}
		else if ($_POST['type'] == 'answer') {
			$answer = "INSERT INTO answer (question_id, name, email, content) VALUES (
				'".$_POST['question_id']."',
				'".$_POST['name']."',
				'".$_POST['email']."',
				'".$_POST['content']."'
			)";
			mysql_query($answer);
		}
		$sql = "SELECT * FROM question";
		$result = mysql_query($sql);
	?>
	<div align="center">
	<?php while ($row = mysql_fetch_assoc($result)) { ?>
		<?php echo $row['vote'] . " "; ?>
		<a href="answer.php?question_id=<?php echo $row['id']; ?>"><?php echo $row['topic'] . " "; ?></a>
		<?php echo "asked by ". $row['name'] . " "; ?>
		| <a href="create.php?question_id=<?php echo $row['id']; ?>">edit</a> | delete
		<br>
		<hr width="75%" align="center">
	<?php } ?>
	</div>
	<?php mysql_close($conn); ?>
</body>
</html>