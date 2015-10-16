<!DOCTYPE html>
<hmtl>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="stackExchange">
		<center><h1>Simple StackExchange</h1><br><br></center>
		<h1>What's your question?</h1>
		<hr>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "stackexchange";
			$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
			@mysql_select_db('stackexchange') or die(mysql_error());
			$quest_id = $_GET["id"];
			$query = "SELECT * FROM question WHERE (question_id = $quest_id)";
			$result = mysql_query($query);
			$name = mysql_result($result, 0, "name");
			$email = mysql_result($result, 0, "email");
			$topic = mysql_result($result, 0, "topic");
			$content = mysql_result($result, 0, "content");
			$vote_question = mysql_result($result, 0, "vote_question");
			$date_question = mysql_result($result, 0, "date_question");
			mysql_close();
		?>	
		<form name="question_form"  onsubmit="return validasi_input()" class="question-form" action="update-question.php?id=<?= $quest_id ?>" method="POST">
			<div class="question-container">
				<label class="name">
					<input type="text" name="name" value="<?= $name ?>">
				</label>
				<label class="email">
					<input type="text" name="email" value="<?= $email ?>">
				</label>
				<label class="topic">
					<input type="text" name="topic" value="<?= $topic ?>">
				</label>
				<label class="content">
					<textarea type="text" name="content"><?= $content ?></textarea>
				</label>
			</div>
			<button class="post-button" type="submit" value="Submit"><b>Post</b></button>
		</form>
	</div>
	<script type="text/javascript" src="function.js"></script>
</body>
</html>