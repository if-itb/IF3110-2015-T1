<!DOCTYPE html>
<head>
	<!-- Link -->
	<link rel="stylesheet" href="style.css">
	<!-- Script -->
</head>
<body>
	<div class="stackExchange">
		<center><h1>Simple StackExchange</h1><br><br></center>
		<h2 class="answer-h2">The question topic goes here</h2>
		<hr>
		<div class="question">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "stackexchange";
				$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
				@mysql_select_db('stackexchange') or die(mysql_error());
				$quest_id = $_GET["id"];
				$sql = "SELECT `vote_question` FROM `question` WHERE (question_id = $quest_id)";
				$number_count = mysql_query($sql);
				$result = mysql_result($number_count, 0);
			?>
			<div class="number">
				<div class="vote-up-question" data-question-id="<?= $quest_id ?>"></div>
				<div class="number-votes">
					<h2 id="count_vote_question"><?= $result?></h2>
				</div>
				<div class="vote-down-question" data-question-id="<?= $quest_id ?>"></div>
			</div>
			<?php
				$query = "SELECT * FROM question WHERE (question_id = $quest_id)";
				$result = mysql_query($query);
				$name = mysql_result($result, 0, "name");
				$email = mysql_result($result, 0, "email");
				$topic = mysql_result($result, 0, "topic");
				$content = mysql_result($result, 0, "content");
				$date_question = mysql_result($result, 0, "date_question");
			?>
			<div class="QA-content">
				<h3><?php echo $topic; ?><br>
					<?php echo $content; ?>
				</h3>
				<div class="ask-description">	
					<h3>asked by <span style="color: #502fc8"><?php echo $name; ?></span> at <?= $date_question ?> | 
					<a href="/tugasWBD/edit-question.php?id=<?= $quest_id ?>">
						<span style= "color: #ffcb55">edit</span> 
					</a> | 
					<a href="/tugasWBD/delete-question.php?id=<?= $quest_id ?>" onclick= "return confirm('Do you want to delete this question ?');">
						<span style= "color: #fd294a">delete</span></h3>
					</a>
				</div>
			</div>
		</div>
		<?php
			$query = "SELECT * FROM answer WHERE (question_id = $quest_id)";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);
		?>
		<h2 class="answer-h2"><?= $num ?> Answer</h2>
		<hr>
		<?php
			$i = 0;
			while ($i < $num) {
				$answer_id = mysql_result($result, $i, "answer_id");
				$name = mysql_result($result, $i, "name");
				$email = mysql_result($result, $i, "email");
				$content = mysql_result($result, $i, "content");
				$vote_answer = mysql_result($result, $i, "vote_answer");
				$date_answer = mysql_result($result, $i, "date_answer");
		?>
		<div class="answer">
			<div class="number">
				<div class="vote-up-answer" data-question-id="<?= $quest_id ?>" data-answer-id="<?= $answer_id ?>"></div>
				<?php 
					$sql = "SELECT `vote_answer` FROM `answer` WHERE (`question_id` = '$quest_id') AND (`answer_id` = '$answer_id')";
					$number_count_ans = mysql_query($sql);
					$result_answer = mysql_result($number_count_ans, 0);
				?>
				<div class="number-votes">
					<h2 id="count_vote_answer<?= $answer_id ?>"><?= $result_answer?></h2>
				</div>
				<div class="vote-down-answer" data-question-id="<?= $quest_id ?>" data-answer-id="<?= $answer_id ?>"></div>
			</div>
			<div class="QA-content">
				<h3><?= $content ?></h3>
				<div class="ask-description">	
					<h3>asked by <span style="color: #502fc8"><?= $email ?></span> at <?= $date_answer ?></h3>
				</div>
			</div>
		</div>
		<?php $i++; } ?>
		<?php mysql_close(); ?>	
		<h2 class="answer-h2"> <span style="color: #888888">&nbsp;&nbsp;Your Answer</span></h2>
		<form name="question_form"  onsubmit="return validasi_inputAnswer()" class="QA-form" action="data-answer.php?id=<?= $quest_id ?>" method="POST">
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
	<script type="text/javascript" src="function.js"></script>
</body>
</html>