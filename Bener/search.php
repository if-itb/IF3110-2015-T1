<!DOCTYPE html>
<html>

<head>
	  <title>Simple StackExchange</title>
</head>

<body>
<?php
	$search_key = $_POST['search_key'];
	header('Location: question.php?search_key='.$search_key);
?>

</body>
</html>