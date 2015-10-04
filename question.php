<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange Question
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Simple Stack Exchange</h1>
	<h2>What's your question?</h2>
	<hr>
	<form>
	  <input type="text" name="firstname" placeholder="Name"><br>
	  <input type="text" name="lastname" placeholder="Email"><br>
	  <input type="text" name="lastname" placeholder="Question Topic"><br>
	  <textarea type="text" rows="4" name="lastname" placeholder="Content" class="content"></textarea><br>
	  <button type="submit" form="form1" value="Submit">Post</button>
	</form> 

</body>

<?php
$link = mysql_connect('localhost', 'root', "", "stackexchange");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_close($link);
?>
</html> 