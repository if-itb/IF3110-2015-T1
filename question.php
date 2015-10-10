<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="validation.js"></script>
		<title>Stack Exchange</title>
	</head>
	<body>
		<h1>Simple StackExchange</h1>
		<br>
		<h2 class="header">What's your question ?</h2>
		<br>
		<form name = "inputForm" onsubmit="return validateForm()" action="post.php" method="post" >
			<div id = "name_box">
				<input type="text" name="asker_name" placeholder="Name"><br>
				<input type="text" name="asker_email" placeholder="Email"><br>
				<input type="text" name="question_topic" placeholder="Question Topic"><br>
			</div>
			<div>
				<textarea name="content" placeholder="Content"></textarea><br><br>
			</div>
			<div id = "post_button">
				<input type="submit" value="Post" onclick="location.href='index.php'">
			</div>
		</form>
	</body>
</html>