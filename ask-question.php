<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>

	<title>Stack Exchange</title>
	<link rel="StyleSheet" href="css/style.css" type="text/css">

</head>



<body>

<div id="header">
	<h1> Simple Stack Exchange </h1>
</div>

<div class = "container">
	<h2> What's Your Question? <hr> </h2>
	<form method="POST" action="add-question.php">
		<input type="text" name="question_name" id="question_name" placeholder="Name">
		<br>
		<input type="text" name="question_email" id="question_email" placeholder="Email">
		<br> 
		<input type="text" name="question_topic" id="question_topic" placeholder="Question Topic">
		<br>
		<textarea name="question_content" id="question_content" rows="15" placeholder="Content"></textarea>
		<br>
		<input type="submit" id="submit_question" name="submit_question" value="Post">
	</form>
</div>

</body>
</html>
