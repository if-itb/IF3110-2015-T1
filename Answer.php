<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include("DB_connection.php"); ?>
	
	<div class="container">
		<h1>Simple StackExchange</h1>
		
		<hr>
		<div class="question">
				<div class="vote">
					
				</div>
				<div class="content">
				
				</div>
		</div>
		<div class="answer">
				<div class="vote">
				
				</div>
				<div class="content">
				
				</div>
		</div>
		<div class="answer">
				<div class="vote">
				
				</div>
				<div class="content">
				
				</div>
		</div>
		<div class="answerform">
		Your Answer
			<form action="add_answer.php" method="post">
				<input type="text" name="Name" placeholder="Name" >
				<input type="text" name="Email" placeholder="Email">
				<textarea placeholder= "Content" name="message"  ></textarea>
				<input class="button" type="submit" name="Post" value="Post">
			</form>
		</div>
	</div>	
</body>
</html>