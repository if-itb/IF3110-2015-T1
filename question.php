<!DOCTYPE html>
<html>
	<head>
		<Title> Simple StackExchange </Title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<script src="script.js"></script>
		<meta> </meta>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1> Simple Stack Exchange </h1>
			</div>
			<div class="question">
				<div class="heading"><h3> What's your question? </h3></div>
				<form action="answer.php" method="post" name="questionForm" >
					<div class="textbox">
						<!-- Name -->
						<input type="text" name="name" placeholder="Name" size="50" onsubmit="return validateName('questionForm')">
					</div>
					<div class="textbox">
						<!-- Email -->
						<input type="text" name="email" placeholder="E-mail" size="50" onsubmit="return validateEmail('questionForm')">
					</div>
					<div class="textbox">
						<!-- Question Topic -->
						<input type="text" name="questiontopic" placeholder="Question Topic" size="50" onsubmit="return validateQuestionTopic('questionForm')">
					</div>
					<div class="textbox">
						<!-- Content -->
						<textarea type="text" name="content" placeholder="Content" cols="52" rows="7" onsubmit="return validateContent('questionForm')"></textarea>
					</div>
					<div class="post-button"><input type="submit" value="Post"></div>
				</form>
			</div>
		</div>
	</body>
</html>