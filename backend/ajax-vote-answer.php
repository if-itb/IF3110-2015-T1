<head>
<?php
	include('connect-mysql.php');

	$id = $_POST['id'];
	$vote = $_POST['vote'];
	$result = mysqli_query($con, "SELECT votes FROM answers WHERE id = '$id'");
	$row = mysqli_fetch_array($result);
	$vote += $row['votes'];
	if(!mysqli_query($con, "UPDATE answers SET votes = '$vote' WHERE id = '$id'")){
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>
</head>
<body>
	<?php echo $vote;?>
</body>
</html>
