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

<center><form action="search.php" method="post">
	<input type="text" name="search" placeholder="topic/question">
	<button type="submit">Search</button>
</form>
Cannot find what you're looking for? Ask <a href="form.php?idx=1">here</a>.
</center>

<h2>Recently Asked Questions</h2>
<?php
	include "function/database.php";
	$conn = connect_database();
	
	$sql = "SELECT * FROM `question` ORDER BY date_created DESC LIMIT 5";
	$result = mysqli_query($conn,$sql);

	show_query($result);

	mysqli_close($conn);
?>

</body>
</html>