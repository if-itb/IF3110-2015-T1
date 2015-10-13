<html>
	<head>
		<title>Your Question Form</title>
		<script src="js/script.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<h1><a href="index.php">Simple StackExchange</a></h1>
		<h2>Question Form</h2>
		
		<h3>What's your question?</h3>
		
		<form name="QuestionForm" action="question-submit.php" onsubmit="return validateQuestionForm()" method="post">
			Name: &nbsp; <input type="text" name="name" /> <br />
			Email: &nbsp; <input type="text" name="email" /> <br />
			Question Topic: &nbsp; <input type="text" name="topic" /> <br />
			Content: &nbsp;<input type="text" name="content" /> <br />
			<input type="submit" value="Post" />
		</form>
	</body>
</html>
