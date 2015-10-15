<!DOCTYPE html>
<html>
	<head>
		<title>Your Question Form</title>
		<script src="js/script.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<h1><a href="index.php">Simple StackExchange</a></h1>
		<h2>Question Form</h2>
		
		<br>
		<h3><center>What's your question?</center></h3>
		<hr width="45%" />
		
		<table class="tableform">
			<form name="QuestionForm" action="question-submit.php" onsubmit="return validateQuestionForm()" method="post">
				<tr>
					<td class="label">Name</td>
					<td><input type="text" name="name" class="textbox"/></td>
				</tr>
				<tr>
					<td class="label">Email</td>
					<td><input type="text" name="email" class="textbox"/></td>
				</tr>
				<tr>
					<td class="label">Question Topic</td>
					<td><input type="text" name="topic" class="textbox"/></td>
				</tr>
				<tr>
					<td class="label">Content</td>
					<td><textarea name="content" rows="5" class="textareascroll"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" value="Post" /></td>
				</tr>
			</form>
		</table>
		<br><br><br><br><br>
	</body>
</html>
