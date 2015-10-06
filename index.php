<!DOCTYPE html>
<html>
<head>
	<title>StackExchange</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">

	<h1>Simple StackExchange</h1>
		<form class="search-box" action="">
			<input  type="text" name="searchbox">
			<input  type="submit" value="Search">
		</form>
		<div class="center" >
		Canot find what you are looking for? <a href="AskHere.php">Ask here</a>
		</div>
		<br>
		<br>
		Recently Asked Questions
		<?php include('AskedQuestion.php');?>
</div>
</body>
</html>