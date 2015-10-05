<?php

include("init_thread.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple StackExchange | Home</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
	<div id="header">
		<h1>Simple StackExchange</h1>
	</div>

	<div class="main">
		<div class="wrapper" id="the-question">
			<div class="content-header">
				<h2><?php echo $question['q_topic']; ?></h2>
			</div>
			<div class="child-content">
				<div class="sidebar">
					<img src="img/up.png"><br>
					<?php echo $question['q_vote']; ?><br>
					<img src="img/down.png">
				</div>
				<div class="list-content">
					<div id="questioncontent"><?php echo $question['q_content']; ?></div>
					<div id="options" class="content-footer">
						asked by <span class="user-question"><?php echo $question['q_name']; ?></span> at <?php echo $question['q_datetime']; ?> | <a href="#" class="edit-question">edit</a> | <a href="#" class="delete-question">delete</a></div>
				</div>
			</div>	
		</div>
		
		<div class="wrapper" id="the-answers">
			<div class="content-header">
				<h2><?php echo count($answers); ?> Answers</h2>
			</div>

			<?php foreach ($answers as $answer) : ?>

			<div class="child-content">
				<div class="sidebar">
					<img src="img/up.png"><br>
					<?php echo $answer['a_vote']; ?><br>
					<img src="img/down.png">
				</div>
				<div class="list-content">
					<div id="questioncontent"><?php echo $answer['a_content']; ?></div>
					<div id="options" class="content-footer">
						answered by <span class="user-question"><?php echo $answer['a_name']; ?></span> at <?php echo $answer['a_datetime']; ?>
					</div>
				</div>
			</div>

			<?php endforeach; ?>
		</div>

		<div class="wrapper" id="answer-form">
			<div class="child-content">
				<div class="content-header">
					<h2>Your Answer</h2>
				</div>
				<form role="form" onsubmit="return validateAnswerForm()" action="add_answer.php" method="post" id="the-form">
					<input type="text" name="name" placeholder="Name" id="name"><br>
					<input type="email" name="email" placeholder="Email" id="email"><br>
					<textarea name="content" form="the-form" placeholder="Content" id="content"></textarea><br>
					<input type="submit" value="Post" name="post" id="post">
				</form>
			</div>
		</div>
	</div>
	
</div>
</body>
</html>