<!DOCTYPE html>
<html>
<head>
	<title>
		Simple StackExchange
	</title>
	<link rel='stylesheet' type="text/css" href="css/sst.css">
</head>

<body>
	<h1 align="center">Simple StackExchange</h1>
	<br>
	<br>
	<h3 id="ask_here">Cannot find what you are looking for? <a href="create.php">Ask here</a></h3>
	<br>
	<h3 id="recent">Recently Asked Questions</h3>
	<hr>
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
	<div class="question">
	<?php while ($row = mysql_fetch_assoc($result)) { ?>
		<div class="question" id="votes">
			<?php echo $row['vote'] . " "; ?> <div>Vote(s)</div>
		</div>
		<div class="question" id="answers">
			<?php
				$answer_count_sql = "SELECT count(id) as c FROM answer WHERE question_id='".$row['id']."'";
				$answer_count = mysql_fetch_assoc(mysql_query($answer_count_sql));
				echo $answer_count['c'];
			?> <div>Answer(s)</div>
		</div>
		<div class="question" id="topic">
			<a href="answer.php?question_id=<?php echo $row['id']; ?>"><?php echo $row['topic'] . " "; ?></a>
		</div>
		<div class="question" id="asked_by">
			<br>
			<br>
			<?php echo "asked by "?>
			<font color="#0024ff">
				<?php echo $row['name'] . " "; ?>
			</font>
			| <a href="create.php?question_id=<?php echo $row['id']; ?>"><font color="ffdb00">edit</font></a> | 
			<font color="#ff1a00">delete</font>
		</div>
		<hr>
	<?php } ?>
	</div>
	<?php mysql_close($conn); ?>
</body>
</html>