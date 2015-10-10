<!DOCTYPE html>
<head>
	<title>Simple StackExchange</title>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>

	What's your question?
	<form method="post" action="backend/add_question.php">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<input type="text" name="topic" placeholder="Question Topic"><br>
		<input type="text" name="content" placeholder="Content" rows="5"><br>
		<button type="submit">Post</button>
	</form>
</body>