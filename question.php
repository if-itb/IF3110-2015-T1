<!DOCTYPE html>
<html>
<head>
	<title>Home - Simple Stack Exchange</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h1 id="title">Simple Stack Exchange</h1>
		</div>

		<div class="question">
			<h3 id="wh-question">What's your question?</h3>
			<hr>

			<form name="question-form" class="question-form">
				<div><input type="text" id="name" placeholder="Name"></div>
				<div><input type="text" id="email" placeholder="Email"></div>
				<div><input type="text" id="topic" placeholder="Question Topic"></div>
				<div><textarea rows="10" id="content" cols="106" placeholder="Content"></textarea></div>

				<input type="submit" id="post-button" value="Post">
			</form>
		</div>
	</div>
</body>

</html>