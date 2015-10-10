<head>
<?php
	include('db_connector.php');
	// escape variables for security
	$id_answer = $_POST['id'];
	$vote = $_POST['vote'];
	$result = mysqli_query($con, "SELECT votes FROM answer WHERE id_answer = '$id_answer'");
	$row = mysqli_fetch_array($result);
	if($vote == 1){
		$vote += $row['votes'];
		if(!mysqli_query($con,"UPDATE answer SET votes = '$vote' WHERE id_answer = '$id_answer'")){
			die('Error: ' . mysqli_error($con));
		}
	} else if($vote == -1 && $row['votes'] > 0){
		$vote += $row['votes'];
		if(!mysqli_query($con,"UPDATE answer SET votes = '$vote' WHERE id_answer = '$id_answer'")){
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
</html>
