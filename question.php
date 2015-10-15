<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange Question
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php" style="text-decoration:none; color:black"><h1>Simple StackExchange</h1></a>
	<h2>What's your question?</h2>
	<hr>
	<form action="index.php" method="post">
	  	<input type="text" name="user" placeholder="Name"><br>
	  	<input type="text" name="email" placeholder="Email"><br>
	  	<input type="text" name="topic" placeholder="Question Topic"><br>
	  	<textarea type="text" rows="7" name="content" placeholder="Content" class="content"></textarea><br>
		<input type="submit" value="Post" class="post">
	</form> 

</body>


</html> 