<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<title>
			Page 2 - TuCil WBD
		</title>
	</head>

	<body>
	
		<div class="header">
			<h1>
				Simple StackExchange
			</h1>
		</div>	
		
			<br>
			
		<div class="judulform text-left">
				What's your question ?
		</div>

		<br>
		
		<form action="page1.php" method="post">
			<div class="text-left">
					<input class="form-textbox" type="text" name="name" placeholder="Name"><br><br>
					<input class="form-textbox" type="text" name="email" placeholder="Email"><br><br>
					<input class="form-textbox" type="text" name="question" placeholder="Question Topic"><br><br>
					<textarea name="content" placeholder="Content" rows="10"></textarea><br><br>
			</div>
		
			<div class="text-right">
				<input class="form-submit" type="submit" name="post" value="Post">
			</div>
		</form>

	</body>
</html>