<?php
	require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Simple StackExchange | Ask</title>

	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/validation.js"></script>
</head>

<body>

<div class="container">
	<div id="header">
		<h1><a href="index.php">Simple StackExchange</a></h1>
	</div>

	<div class="main">
		<div class="wrapper" id="question-form">
			<div class="content-header">
				<div class="q-title">
					<h3>What's your question?</h3>
				</div>
			</div>

			<div class="child-content">
				<form role="form" method="post" onsubmit="return validateQuestionForm()" action="add-question.php" id="the-form">
					<input type="text" name="name" placeholder="Name" id="name" autofocus><br>
					<input type="email" name="email" placeholder="Email" id="email"><br>
					<input type="text" name="topic" placeholder="Question Topic" id="topic" ><br>
					<textarea rows="10" cols="107" name="content" form="the-form" placeholder="Content" id="content"></textarea><br>
					<input type="submit" value="Post" name="post" id="post">
				</form>
			</div>
		</div>
	</div>
	
</div>

</body>
</html>