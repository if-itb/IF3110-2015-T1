<?php
	require_once("./database.php");
?>

<?php
	$questions = getQuestions();
?>

<html>
	<head>
		<title> Simple StackExchange </title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Simple StackExchange</h1>
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
					<?php echo $question['Title'] ?>
				</div>
				<div id="idx_content">
					<?php echo $question['Content'] ?>
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
