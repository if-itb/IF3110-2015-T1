<!DOCTYPE html>
<html>
	<head>
		<title>StackExchange</title>
		<link rel="stylesheet" type="text/css" href="./css/main.css">
	</head>
	<body>
		<a href="showquestion.php"><h1 id="header">Simple StackExchange</h1></a>
		<div class="next">	
			<h2 class="subtitle">What's your question?</h2>
			<form action="question.php" method="POST">
				<div class="coba">
					<input type="text" name="nama" placeholder="Name">
					<input type="text" name="email" placeholder="Email">
					<input type="text" name="topikpertanyaan" placeholder="Question Topic">
					<textarea name="pertanyaan" placeholder="Content" rows="10" cols="10"></textarea>
				</div>
				<input type="submit" value="Post" class="bawah">
			</form>
		</div>
	</body>
</html>