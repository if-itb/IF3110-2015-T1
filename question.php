<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='style.css'/>
	</head>
	<body>
		<div class="header">
			<div class="container">
				<p>Simple StackExchange</p> 
			</div>
		</div>
		
		<div class="main">
			<div class="container">
				<p>What's your question?</p>
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