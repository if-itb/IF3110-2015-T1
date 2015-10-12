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

<?php
	include "function/database.php";
	$conn = connect_database();
	
	$sql = "SELECT * FROM `question` WHERE topic LIKE '%".$_POST["search"]."%' OR content LIKE '%".$_POST["search"]."%'";
	$result = mysqli_query($conn,$sql);

	show_query($result);
	mysqli_close($conn);
?>

</body>
</html>