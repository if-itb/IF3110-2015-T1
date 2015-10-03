<html>
<head>
<?php
	include('add_answer.php');
	// escape variables for security
	$id_answer = $_GET['id_answer'];
	$votes = $_GET['votes'];
	if(!mysqli_query($con,"UPDATE answer SET votes = votes + '$votes' WHERE id_answer = '$id_answer'")){
		die('Error: ' . mysqli_error($con));
	}
	$result = mysqli_query($con, "SELECT votes FROM answer WHERE id_answer = '$id_answer'");
	mysqli_close($con);
	$row = mysqli_fetch_array($result);
?>
</head>
<body>
	<div class="votes"></div>
</body>
</html>
