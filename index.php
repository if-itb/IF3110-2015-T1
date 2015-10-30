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
	if (isset($_POST['type'])) {
		if ($_POST['type'] == 'ask')
			postQuestion($_POST);
	}
	$q = '';
	if (isset($_GET['q']) && !is_null($_GET['q'])) {
		$q = $_GET['q'];
		$questions = getQuestions($_GET['q']);
	} else {
		$questions = getQuestions();
	}
?>

<div id="main-page" onload="function() {document.getElementById('autofocus').focus();}">
	<div id="main-search" class="center">
		<form action="index.php" method="GET">
			<input autofocus="autofocus" type="text" name="q" id="search-bar" placeholder="Search question topic or content here..." value="<?php echo $q ?>">
			<input type="submit" value="Search">
		</form>
		<p>Cannot find what you are looking for? <a href="ask.php">Ask here</a></p>
	</div>

	<div class="questions">
		<h3>Recently Asked Questions</h3>
		<?php if (count($questions) === 0) echo "Be the first person to ask the question!" ?>
		<?php foreach ($questions as $question) : ?>
			<div class="question">
					<div class="row">
						<div class="col vote in-numbers">
							<div class="number"><?php echo $question['vote'] ?></div>
							<div class="flag">Votes</div>
						</div>
						<div class="col answers in-numbers">
							<div class="number"><?php echo $question['answer'] ?></div>
							<div class="flag">Answers</div>
						</div>
						<div class="col title">
							<a href="question.php?id=<?php echo $question['question_id'] ?>">
								<?php echo $question['topic'] ?>
							</a>
							<?php
								$content = $question['content'];
								if (strlen($content) > 100) {
									echo substr($question['content'], 0, 110) . '...';
								} else {
									echo $content;
								}
							?>
						</div>
					</div>
					<div class="row">
						<div class="controls" align="right">
							asked by <span class="name"><?php echo $question['name'] ?></span> |
							<span class="link edit"><a href="ask.php?question_id=<?php echo $question['question_id']?>">edit</a></span> |
							<span class="link delete"><a href="javascript:deleteQuestion(<?php echo $question['question_id'] ?>)">delete</a></span>
						</div>
					</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
	</div>
 </body>
 </html>
 
