<!DOCTYPE html>
<html>

<head>
	  <title>Simple StackExchange</title>
</head>

<body>

<?php include 'connect.php';?>	
<?php
	$search_key = mysqli_real_escape_string ($conn, $_POST["search_key"]);

	header('Location: question.php?search_key='.$search_key);
?>

</body>
</html>