<?php 
	require_once("database.php");

	if (isset($_POST['question_id'])) {
		if ($_POST['type'] == 'answer') {
			postAnswer($_POST);
		}
	}

	if (!isset($_GET['id'])) {
		echo "<div class=\"error\">Please give us the question id so we can show you the question.</div>";
	} else {
		$question = getQuestion($_GET['id']);
		$answers = getAnswers($_GET['id']);
	}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Simple StackExchange</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<div class="container">
		<div class="header">
			<h1 class="center">Simple StackExchange</h1>
		</div>
		<div id="question-page">
			<h2 class="underline"><?php echo $question['title'] ?></h2>
			<div class="question" id="question-<?php echo $question['question_id'] ?>">
				<div class="row">
					<div class="col_vote">
						<a href="" id="increase-vote">
							<img src="img/up.png" width="32" height="32"><br>
						</a>
						<span id="question-vote-count-<?php echo $question['question_id'] ?>"><font size = "5" color ="blue"><?php echo $question['vote'] ?></font></span><br>
						<a href="" id="decrease-vote">
							<img src="img/down.png" width="32" height="32">
						</a>
					</div>
					<div class="col_content">
						<p>
							<?php echo $question['content'] ?>
						</p>
					</div>
				</div>
				<div class="controls" style="border-bottom:0px" align="right">
					asked by <span class="name"><?php echo $question['name'] ?></span> &lt;<span class="email"><?php echo $question['email'] ?>&gt;</span>
					at <span class="create-date"><?php echo date( 'D, j F Y H:i', strtotime($question['date'])) ?></span> |
								<span class="link edit"><a href="ask.php?question_id=<?php echo $question['question_id']?>">edit</a></span> |
								<span class="link delete"><a href="">delete</a></span>
				</div>
			</div>
		</div>

		<div class="answers">
			<h2 class="underline"><?php echo count($answers) ?> Answer<?php if (count($answers) > 1) echo 's' ?></h2>
			<?php foreach($answers as $answer) : ?>
				<div class="answer underline" style="width:100%" id="answer-<?php echo $answer['answer_id'] ?>">
					<div class="row">
						<div class="col_vote">
							<a href="" id="increase-vote">
								<img src="img/up.png" width="32" height="32"><br>
							</a>
							<span id="answer-vote-count-<?php echo $answer['answer_id'] ?>"><font size = "5" color ="blue"><?php echo $answer['vote'] ?></font></span><br>
							<a href="" id="decrease-vote">
								<img src="img/down.png" width="32" height="32">
							</a>
						</div>
						<div class="col_content">
							<p>
								<?php echo $answer['content'] ?>
							</p>
						</div>
					</div>
					<div class="controls" style="border-bottom:0px" align="right">
						answered by <span class="name"><?php echo $answer['name'] ?></span> &lt;<span class="email"><?php echo $answer['email'] ?>&gt;</span>
						at <span class="create-date"><?php echo date( 'D, j F Y H:i', strtotime($answer['date'])) ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		
		
		<div class="answer_form">
		<h2>Your Answer</h2>
		<form action="question.php?id=<?php echo $_GET['id'] ?>" method="POST" onsubmit="return validateAnswerForm(this);">
			<input type="text" class="form" placeholder="Name" name="name" />
			<input type="text" class="form" placeholder="Email" name="email" />
			<textarea class="form" name="content"  rows="5" placeholder="Content"></textarea>
			<div class="right" style="margin-bottom:50px"> 
				<input type="submit" value="Post" >
			</div>
			<input type="hidden" name="type" value="answer" />
			<input type="hidden" name="question_id" value="<?php echo $_GET['id'] ?>" />
		</form>
		</div>
	</div>
	</body>
</html>

	
	

