<!DOCTYPE html>

<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="StackExchange">
		<center>
			<h1>Simple StackExchange</h1><br><br>
		</center>
		<div class="Search">
			<form>
				<center>
					<input type="text" name="search-box" value="">&nbsp;&nbsp;
					<button type="submit" value="Submit">Search</button>
				</center>
			</form>
				<center>
					<p>Cannot find what you are looking for?<a href="question.html"><span style="color : #ffcb55">Ask here</span></a></p><br>
				</center>
		</div>

		<div class="Question">
			<h3>Recently Asked Questions</h3><hr>
			<div class="question-description">
				<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "stackexchange";

						$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
						@mysql_select_db('stackexchange') or die(mysql_error());
						$sql = "SELECT * FROM `question`";
						$result = mysql_query($sql);
						$num = mysql_num_rows($result);

						for($i=0; $i<$num; $i++){
							$question_id = mysql_result($result, $i, "ID");
							$name = mysql_result($result, $i, "Nama");
							$email = mysql_result($result, $i, "Email");
							$topic = mysql_result($result, $i, "Topic");
							$content = mysql_result($result, $i, "Content");
							$vote = mysql_result($result, $i, "Vote");
				?>
				<div class="votes">
					<div class="count">
						<p>0</p>
					</div>
					<p>votes</p>
				</div>
				<div class="answer">
					<div class="count">
						<p>0</p>
					</div>
					<p>answer</p>
				</div>
				<div class="question-list">
					<a href=" /WBD/answer.php?id=<?= $question_id ?>"><p><?php echo $topic; ?></a></p>					
					<div class="asked-description">
						<p>Asked by <span style="color : #502fc8"><?php echo $name; ?></span> |
							<span style="color : #ffcb55"><a href=" /WBD/update-question.php?id=<?= $question_id ?>">edit</a></span> |
							<span style="color : #fd294a"><a href=" /WBD/delete.php?id=<?= $question_id ?>" onclick="return confirm('Do you want to delete this question?');">delete</a></p>
					</div>
				</div>
				<hr>
				<?php } ?>
				<?php mysql_close(); ?>
			</div>
		</div>

	</div>
</body>

</html>