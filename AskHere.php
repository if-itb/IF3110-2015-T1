<!DOCTYPE html>
<html>
<head>
	<title>AskHere</title>
	
</head>
<body>
	<?php include("DB_connection.php"); ?>
	
	<div class="container">
		<h1>Simple StackExchange</h1>
		<h2>What's your question?</h2>
		<hr>
		<div class="questionform">
			<form action="" method="post">
				<input type="text" name="Name" placeholder="Name" >
				<input type="text" name="Email" placeholder="Email">
				<input type="text" name="QuestionTopic" placeholder="Question Topic">
				<textarea placeholder= "Content" name="message"  ></textarea>
				<input class="button" type="submit" name="Post" value="Post">
			</form>
		</div>
	</div>	
</body>
</html>