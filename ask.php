<!DOCTYPE html>
<html>
<head>
	<title>Ask</title>
	<link rel="stylesheet" href="ask.css">
</head>
<body>
	<h1> Simple StackExchange</h1>
	<br>
	<h2> What's your question ? </h2>
	<hr>

	<form action="add_question.php" method="post">
		<input name="nama" class="name" type="text" value="" placeholder="Name"> <br>
		<input class="email" type="text"  name="email" value="" placeholder="Email"> <br>
		<input class="topic" type="text" name="topik" value="" placeholder="Question Topic"> <br>
		<textarea class="content" type="text" name="konten" value="" placeholder="Content"> </textarea><br>
		<input class="submit-button" type="submit" value="Post">
	</form>	

</body>
</html>