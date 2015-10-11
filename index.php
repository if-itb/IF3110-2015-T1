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
				<?php echo $question['Name'] ?>
				<br>
				<?php echo $question['Content'] ?>
				<br>
				<br>
			</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
