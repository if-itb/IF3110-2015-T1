<html>
	<head>
		<title>Your Question Form</title>
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		<h2>Question Form</h2>
		
		<h3>What's your question?</h3>
		
		<form action="question-submit.php" method="post">
			Name: &nbsp; <input type="text" name="completename" /> <br />
			Email: &nbsp; <input type="text" name="email" /> <br />
			Question Topic: &nbsp; <input type="text" name="questiontopic" /> <br />
			Content: &nbsp;<input type="text" name="content" /> <br />
			<input type="submit" value="Post" />
		</form>
	</body>
</html>
