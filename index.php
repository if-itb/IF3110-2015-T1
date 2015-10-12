<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="stackExchange">
		<center><h1>Simple StackExchange</h1><br></center>
		<form class="search-form">
			<input class="search-bar" type="text" name="search">&nbsp;
			<button class="search-button" type="submit"><b>Search</b></button>
		</form>
		<center>
			<h3>Cannot find what you are looking for?<a href="question.html"><span style="color: #ffcb55">Ask here</span></a></h3>
		</center>
		<h2>Recently Asked Questions</h2>
		<hr>
		<div class="question-list">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "stackexchange";
				$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
				@mysql_select_db('stackexchange') or die(mysql_error());
				$query = "SELECT * FROM question";
				$result = mysql_query($query);
				$num = mysql_num_rows($result);
			?>
			<?php		
				$i = 0;
				while($i < $num) {
					$question_id = mysql_result($result, $i, "question_id");
					$name = mysql_result($result, $i, "name");
					$email = mysql_result($result, $i, "email");
					$topic = mysql_result($result, $i, "topic");
					$content = mysql_result($result, $i, "content");
					$vote_question = mysql_result($result, $i, "vote_question");
			?>
			<div class="question-description">
				<!--div class="votes-answers"-->
				<div class="votes">
					<div class="counts">
						<h3>0</h3>
					</div>
					<h3>Votes</h3>
				</div>
				<div class="answers">
					<div class="counts">
						<h3>0</h3>
					</div>	
					<h3>Answers</h3>
				</div>
				<!--/div-->
				<div class="question-topic">
					<a href="/Tubes1/answer.php?id=<?= $question_id ?>">
					<h3><?php echo $topic; ?><br>
						<?php echo $content; ?></h3></a>
					<div class="ask-description">	
						<h3>asked by <span style="color: #502fc8"><?php echo $name; ?></span> | 
						<a href="/Tubes1/edit-question.php?id=<?= $question_id ?>">
							<span style= "color: #ffcb55">edit</span>
						</a> | 
						<a href="/Tubes1/delete-question.php?id=<?= $question_id ?>" onclick= "return confirm('Do you want to delete this question ?');">
							<span style= "color: #fd294a">delete</span></h3>
						</a>
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
			<?php $i++; } ?>
			<?php mysql_close(); ?>	
		</div>
	</div>
</body>
</html>