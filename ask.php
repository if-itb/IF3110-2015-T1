<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple StackExchange | Home</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
	<div id="header">
		<h1>Simple StackExchange</h1>
	</div>

	<div class="main">
		<div class="wrapper" id="question-form">
			<div class="content-header">
				<h2>What's your question?</h2>
			</div>
			<div class="child-content">
				<form role="form" action="add_question.php" method="post" id="the-form">
					<input type="text" name="name" placeholder="Name" id="name" autofocus><br>
					<input type="email" name="email" placeholder="Email" id="email"><br>
					<input type="text" name="topic" placeholder="Question Topic" id="topic"><br>
					<textarea name="content" form="the-form" placeholder="Content" id="content"></textarea><br>
					<input type="submit" value="Post" name="post" id="post">
				</form>
			</div>
		</div>
	</div>
	
</div>
</body>
</html>