<!DOCTYPE html>
<html>
<head>
	<title>Answer a Question</title>
	<link rel='stylesheet' type="text/css" href="css/sst.css">
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
	<h3><?php echo $question['topic']; ?></h3>
	<hr>
	<div class="question">
		<div class="question" id="voteupdown">
			<div>
				<img src="img/up.png" width="20%" height="20%">
			</div>
			<?php echo $question['vote']; ?>
			<div>
				<img src="img/down.png" width="20%" height="20%">
			</div>
		</div>
		<div class="question" id="content">
			<?php echo $question['content']; ?>
		</div>
		<div class="question" id="asked_by">
			asked by <?php echo $question['email']; ?>
			| <a href="create.php?question_id=<?php echo $question_id; ?>"><font color="#ffdb00">edit</font></a> | <font color="ff1a00">delete</font>
		</div>
	</div>

	<h3>
		<?php
			$answer_count_sql = "SELECT count(id) as c FROM answer WHERE question_id=$question_id";
			$answer_count = mysql_fetch_assoc(mysql_query($answer_count_sql));
			echo $answer_count['c'];
		?> Answer(s)
	</h3>
	<hr>
	<?php
		$answers = "SELECT * FROM answer WHERE question_id=$question_id";
		$result = mysql_query($answers);
	?>
	
	
	<?php while($row = mysql_fetch_assoc($result)) { ?>
		<div class="answer">
			<div class="answer" id="votes">
				<div>
					<img src="img/up.png" width="20%" height="20%">
				</div>
				<?php echo $row['vote']; ?>
				<div>
					<img src="img/down.png" width="20%" height="20%">
				</div>
			</div>
			<div class="answer" id="content">
				<?php echo $row['content']; ?>
			</div>
			<div class="answer" id="answered_by">
				answered by <?php echo $row['email']; ?>
			</div>
			<hr>
		</div>
	<?php } ?>

	<script type="text/javascript">
	    function validateAskForm() {
	        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	        if (document.forms["askform"]["name"].value == null || document.forms["askform"]["name"].value == "" ||
	            document.forms["askform"]["email"].value == null || document.forms["askform"]["email"].value == "" ||
	            document.forms["askform"]["topic"].value == null || document.forms["askform"]["topic"].value == "" ||
	            document.forms["askform"]["content"].value == null || document.forms["askform"]["content"].value == "") {
		            alert("All required fields must be filled out");
		            return false;
	        }
	        else if(!re.test(document.forms["askform"]["email"].value)) {
	            alert("Incorrect email address");
	            return false;
	        }
	    }
	</script>

	<br>
	<h3>Your Answer</h3>
	<form name="askform" action="home.php" class="form" method="POST" onsubmit="return validateAskForm()">
		<input type="text" name="name" placeholder="Name" id="name">
		<br>
		<input type="text" name="email" placeholder="Email" id="email">
		<br>
		<textarea name="content" placeholder="Content" rows="5" id="content"></textarea>
		<br>
		<input type="submit" value="Post" id="submit">
		<input type="hidden" name="type" value="answer">
		<input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
	</form>
	<?php mysql_close($conn) ?>
</body>
</html>