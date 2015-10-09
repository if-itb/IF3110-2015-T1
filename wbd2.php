<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wbd.css">
</head>
<body>
<h1>Simple Stack Exchange</h1>
<div id="container">
	<p id="p2">What's your question?</p>
</div>
<br>
<form name="AskQ" action = "wbd.php" method="post">
	<input id="name" type="text" name="name" class="widthask" placeholder="Name" required"><br>
	<input id="email" type="text" name="email" class="widthask" placeholder="Email" required"><br>
	<input id="questiontopic" type="text" name="questiontopic" class="widthask" placeholder="Question Topic" required"><br>
	<textarea name="content" rows="10" cols="66" name="content" placeholder="Content"></textarea><br>
	<input id="PostButton"type="submit" value="Post">
</form>
</body>
</html>