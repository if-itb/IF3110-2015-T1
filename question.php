<?php
	require_once("./includes/mysql.php");
?>

<html lang="en">
<head> 
	<meta charset="UTF-8">
	<title>Simple StackExchange </title>
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
	<script type="text/javascript" src="js/delete.js"></script>
	<script type="text/javascript" src="js/validate.js"></script>
	<script type="text/javascript" src="js/vote.js"></script>
</head>

<body>
	<div id="wrapper">
		<h1 class = "center"> <a href="index.php"> Simple StackExchange </a>
</h1>



<?php 
	if (isset($_POST['question_id'])){
		if ($_POST['type'] == 'answer'){
			postAnswer($_POST);
		}
	}
	
	if (!isset($_GET['id'])){
		echo "<div class=\"error\">Please give us the question id so we can show you the question.</div>";
	} else {
		$question = getQuestion($_GET['id']);
		$answers = getAnswers($_GET['id']);
	}
?>

<div id= "question_page">
	<div class="section">
		<h2 class="underlined"> <?php echo $question['topic'] ?> </h2>
		<div class="question" id="question-<?php echo $question['question_id'] ?>">
			<div class="row">
				<div class= "vote col">
					<a href="javascript:voteUp(<?php echo $question['question_id'] ?>, 'question')" id = "increase-vote">
						<img src="img/upvote.png" width ="30" height="30">
					</a>
					<span id="question-vote-count-<?php echo $question['question_id'] ?>"> <?php echo $question['vote'] ?> </span>
					<a href="javascript:voteDown(<?php echo $question['question_id']?>, 'question')"id="decrease-vote">
						<img src="img/downvote.png" width="30" height="30">
					</a>	
				</div>
				<div class = "col-content">
					<p>
						<?php echo $question['content'] ?>;
					</p>
			</div>
	</div>
	<div class = "row-info">
		asked by <span class="name"> <?php echo $question['name'] ?></span> &lt; <span class="email"> <?php echo $question['email'] ?> 
		at <span class="create-date"> <?php echo date ('D, j F Y H:i', strtotime($question['create_date'])) ?> </span>
			<span class="link edit"> <a href="ask.php?question_id=<?php echo $question['question_id']?>"> edit</a> </span> |
			<span class="link delete"><a href="javascript:deleteQuestion(<?php echo $question['question_id'] ?>)">delete</a></span>
	
	<div class="section" id="answers">
		<h2 class="underline"><?php echo count($answers) ?> Answer<?php if (count($answers) > 1) echo 's' ?></h2>
		<?php foreach($answers as $answer) : ?>
			<div class="answer underline" id="answer-<?php echo $answer['answer_id'] ?>">
				<div class="row">
					<div class="col vote">
						<a href="javascript:voteUp(<?php echo $answer['answer_id'] ?>, 'answer')" id="increase-vote">
							<img src="img/upvote.png" width="35" height="35">
						</a>
						<span id="answer-vote-count-<?php echo $answer['answer_id'] ?>"><?php echo $answer['vote'] ?></span>
						<a href="javascript:voteDown(<?php echo $answer['answer_id'] ?>, 'answer')" id="decrease-vote">
							<img src="img/downvote.png" width="35" height="35">
						</a>
					</div>
					<div class="col content">
						<p>
							<?php echo $answer['content'] ?>
						</p>
					</div>
				</div>
				<div class="row info">
					answered by <span class="name"><?php echo $answer['name'] ?></span> &lt;<span class="email"><?php echo $answer['email'] ?>&gt;</span>
					at <span class="create-date"><?php echo date( 'D, j F Y H:i', strtotime($answer['create_date'])) ?></span>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="section" id="form-answer">
		<h2>Your Answer</h2>
		<form class="block" action="question.php?id=<?php echo $_GET['id'] ?>" method="POST" onsubmit="return validateAnswerForm(this);">
			<input type="text" placeholder="Name" name="name" />
			<input type="text" placeholder="Email" name="email" />
			<textarea name="content" placeholder="Content"></textarea>
			<input type="submit" value="Post" />
			<input type="hidden" name="type" value="answer" />
			<input type="hidden" name="question_id" value="<?php echo $_GET['id'] ?>" />
		</form>
	</div>	
</div>	

	</div>
 </body>
 </html>