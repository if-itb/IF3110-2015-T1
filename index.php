<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<link href="style.css" rel="stylesheet" type="text/css">
<?php include 'RAQ.php';?>
</head>
<body>

<h1 class="title">Simple StackExchange</h1>

<form class="form" method="post">
	<input type="text" name="search" class="form_search">
	<input type="submit" value="Search" class="form_submit">
</form>

<p> Cannot find what you are looking for? <a href="Question.php">Ask here</a> <p>
 
<h2 class="align"> Recently Asked Questions </h2>

<?php RAQ(); ?>

</body>
</html>
