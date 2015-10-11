<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="Validasi.js"></script>
<?php include 'RAQ.php';?>
</head>
<body>

<a href="index.php" class="black"><h1 class="title">Simple StackExchange</h1></a>

<form class="form" method="post">
	<input type="text" name="search" class="form_search">
	<input type="submit" value="Search" class="form_submit">
</form>

<p> Cannot find what you are looking for? <a href="Question.php" class="color_yellow">Ask here</a> <p>
 
<h2 class="align"> Recently Asked Questions </h2>

<?php RAQ(); ?>

</body>
</html>
