<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="stackExchange">
		<center><h1>Simple StackExchange</h1><br><br></center>
		<h2 class="answer-h2">The question topic goes here</h2>
		<hr>
		<div class="question">
			<div class="number">
				<div class="vote-up"></div>
				<div class="number-votes">
					<h2>2</h2>
				</div>
				<div class="vote-down"></div>
			</div>
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
				$vote = mysql_result($result, 0, "vote");
				$date_question = mysql_result($result, 0, "date_question");
			?>
			<div class="QA-content">
				<h3><?php echo $topic ?><br>
					<?php echo $content ?>
				</h3>
				<div class="ask-description">	
					<h3>asked by <span style="color: #502fc8"><?php echo $name ?></span> at <?= $date_question ?> | 
					<a href="/Tubes1/edit-question.php?id=<?= $quest_id ?>">
						<span style= "color: #ffcb55">edit</span> 
					</a> | 
					<span style= "color: #fd294a">delete</span></h3>
				</div>
			</div>
		</div>
		<h2 class="answer-h2">1 Answer</h2>
		<hr>
		<?php
			$query = "SELECT * FROM answer WHERE (answer_id = $quest_id) ";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);
			$i = 0;
			while ($i < $num) {
				$name = mysql_result($result, $i, "name");
				$email = mysql_result($result, $i, "email");
				$content = mysql_result($result, $i, "content");
				$vote = mysql_result($result, $i, "vote");
				$date_answer = mysql_result($result, $i, "date_answer");
		?>
		<div class="answer">
			<div class="number">
				<div class="vote-up"></div>
				<div class="number-votes">
					<h2>2</h2>
				</div>
				<div class="vote-down"></div>
			</div>
			<div class="QA-content">
				<h3><?= $content ?></h3>
				<div class="ask-description">	
					<h3>asked by <span style="color: #502fc8"><?= $name ?></span> at <?= $date_answer ?></h3>
				</div>
			</div>
		</div>
		<?php $i++; } ?>
		<?php mysql_close(); ?>	
		<h2 class="answer-h2"> <span style="color: #888888">&nbsp;&nbsp;Your Answer</span></h2>
		<form class="QA-form" action="data-answer.php?id=<?= $quest_id ?>" method="POST">
			<div class="question-container">
				<label class="name">
					<input type="text" name="name" placeholder="Name">
				</label>
				<label class="email">
					<input type="text" name="email" placeholder="Email">
				</label>
				<label class="content">
					<textarea type="text" name="content" placeholder="Content"></textarea>
				</label>
			</div>
			<button class="post-button" type="submit"><b>Post</b></button>
		</form>
	</div>
</body>
</html>