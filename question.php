<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='style.css'/>
	</head>
	<body>
		<div class="header">
			<div class="container">
				<p><a href="index.php">Simple StackExchange</a></p> 
			</div>
		</div>
		
		<div class="main">
			<div class="container">
				<h1>What's your question?</h1>
				<form action="index.php" method="post" class="form">
					<input type="text" name="name" placeholder="Name"><br>
					<input type="text" name="email" placeholder="Email"><br>
					<input type="text" name="topic" placeholder="Question Topic"><br>
					<textarea name="content" placeholder="Content"></textarea>
					<input type="submit" value="Post" align="right">
				</form>
			</div>
		</div>
	
	</body>
</html>