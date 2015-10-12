<!DOCTYPE html>
<html>
	<head>
		<title>Stack Exchange</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
		<script src="Functions.js"></script>
	</head>
	<body>
		<div class="container">
			<h1><a href="/stackExchange/index.php">Simple StackExchange</a></h1><br>
			<h2>What's your question? </h2><br>
			<form name="QuestionForm" action="AddQuestion.php" onsubmit="return validateQuestionForm()" method="POST">
				<input type="text" name="name" id="inputtext1" placeholder="Name"><br>
				<input type="text" name="email" id="inputtext1" placeholder="Email"><br>
				<input type="text" name="topic" id="inputtext1" placeholder="Question Topic"><br>
				<textarea name="content" id="content" placeholder="Content"></textarea><br><br>
				<input type="submit" value="Post">
			</form>
		</div>
	</body>
</html>