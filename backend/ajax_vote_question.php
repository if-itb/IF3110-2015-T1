<head>
<?php
	include('db_connector.php');
	// escape variables for security
	$id = $_POST['id'];
	$vote = $_POST['vote'];
	$result = mysqli_query($con, "SELECT votes FROM question WHERE id = '$id'");
	$row = mysqli_fetch_array($result);
	if($vote == 1){
		$vote += $row['votes'];
		if(!mysqli_query($con,"UPDATE question SET votes = '$vote' WHERE id = '$id'")){
			die('Error: ' . mysqli_error($con));
		}
	} else if($vote == -1 && $row['votes'] > 0){
		$vote += $row['votes'];
		if(!mysqli_query($con,"UPDATE question SET votes = '$vote' WHERE id = '$id'")){
			die('Error: ' . mysqli_error($con));
		}
	}
	else $vote = $row['votes'];
	mysqli_close($con);
?>
</head>
<body>
	<?php echo $vote;?>
</body>
