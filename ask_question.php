<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<center><h1>Simple StackExchange</h1></center>
<br>
<form id="question-form" action="submit.php" method="post">
	<center>
		<input type="text" name="name" placeholder="name"><br>
		<input type="text" name="email" placeholder="email"><br>
		<input type="text" name="topic" placeholder="topic"><br>
		<textarea name="content" placeholder="content"></textarea><br>
	</center>	
		<button type="submit" name="search">Submit</button>
</form>

</body>