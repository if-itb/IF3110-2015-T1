<!DOCTYPE html>
<html>
<head>
  	<title>Create</title>
  	<meta charset="UTF-8">

	<style>
	h1 {
	    text-align: center;
	    font-size: 55px;
	}
	p {
		text-align: center;
	    font-size: 200%;
	}
	form{
		text-align: center;
	}
	</style>
</head>
<body>

<h1>Simple StackExchange</h1>
<p>What's your question?</p><br>

<form action="answer.php" method="post">
	<input type="text" name="name" placeholder="Name" size="100"><br>
	<input type="text" name="email" placeholder="Email" size="100"><br>
	<input type="text" name="topic" placeholder="Question Topic" size="100"><br>
	<textarea name="comment" rows="5" cols="40"></textarea><br>
	<input type="submit" value="Submit">
</form>

</body>
</html>


