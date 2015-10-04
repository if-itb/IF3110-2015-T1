<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Simple Stack Exchange</h1>
	<div>
		<span>
			<input type="text" class="search"></input>
		</span>
		<span>
			<button type="submit" class="buttonsearch"form="form1" value="Submit">Post</button>
		</span>
	</div>
	<h3>
		Cannot find what you are looking for? 
		<a href="question.php">Ask here</a>
	</h3>
	<h2>Recently Asked Questions</h2>
	<hr>
	

</body>

<?php
	$link = mysql_connect('localhost', 'root', "", "stackexchange");
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_close($link);
?>
</html> 