<!DOCTYPE html>
<html>
<head>
<title>Question</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1 class="title">Simple StackExchange</h1>

<h2 class="align">What's your question?</h2>

<form class="align" action="Ask.php" method="post">
	<div class="kotakform">
		<input type="text" name="Name" class="form_question" placeholder="Name">
	</div>
	<div class="kotakform">
		<input type="text" name="Email" class="form_question" placeholder="Email">
	</div>
	<div class="kotakform">
		<input type="text" name="Topic" class="form_question" placeholder="Question Topic">
	</div>
	<div class="kotakform">
		<textarea name="Content" class="form_content" placeholder="Content"></textarea>
	</div>
	<div class="form_post">
		<input type="submit" value="Post">
	</div>
</form>

</body>
</html>
