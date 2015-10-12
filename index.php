<?php
	require_once("./database.php");
?>

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

<html>
	<head>
		<title> Simple StackExchange </title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1><a id="a3" href="index.php">Simple StackExchange</a></h1>
		<div id="div1">
			<FORM>
			<INPUT TYPE ="SEARCH">
			<INPUT TYPE ="Submit" VALUE="Search">
		</FORM>
		</div>
		<p id="p1">
			Cannot find what you are looking for?
			<a id="a1" href="ask.php">
				Ask here
			</a>
		</p>
		<br>
		<div id="div2">
			<p id="p2">
				Recently Asked Questions
			</p>
		</div>
		<div id="div3">
			<?php foreach ($questions as $question) : ?> 
			<div id="div4">
				<div id="idx_vote">
					<div> <?php echo $question['Vote'] ?> </div>
					<div> Votes </div>
				</div>
				<div id="idx_answer">
					<div> <?php echo 0 ?> </div> 
					<div> Answer </div>
				</div>
				<div id="idx_title">
					<a id="a3" href="question.php?q_id=<?php echo $question['Q_ID'] ?>"> <?php echo $question['Title'] ?> </a>
				</div>
				<div id="idx_content">
					<?php
						$content = $question['Content'];
						if (strlen($content) > 100) {
							echo substr($question['Content'], 0, 110) . '...';
						} else {
							echo $content;
						}
					?>
				</div>
				<div id="div5">
					<p>
						asked by <span id="idx_name"> <?php echo $question['Name'] ?> </span> | <span id="idx_edit"> <a id="a2" href="ask.php?q_id=<?php echo $question['Q_ID'] ?>"> edit </a> </span>
					</p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
