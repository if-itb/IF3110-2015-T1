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
					
					<td><input type="text" name="name" class="textbox" value="Name" onfocus="inputFocus(this)" onblur="inputBlur(this)"/></td>
				</tr>
				<tr>
					
					<td><input type="text" name="email" class="textbox" value="Email" onfocus="inputFocus(this)" onblur="inputBlur(this)"/></td>
				</tr>
				<tr>
					
					<td><input type="text" name="topic" class="textbox" value="Question Topic" onfocus="inputFocus(this)" onblur="inputBlur(this)"/></td>
				</tr>
				<tr>
					
					<td><textarea name="content" rows="5" class="textareascroll" placeholder="Content" onfocus="inputFocus(this)" onblur="inputBlur(this)"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" value="Post" /></td>
				</tr>
			</form>
		</table>
		<br><br><br><br><br>
	</body>
</html>
