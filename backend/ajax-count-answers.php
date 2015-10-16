<?php 
	include('connect-mysql.php');

	$id = $_GET['id'];
	$sql = "SELECT COUNT(*) AS count FROM answers WHERE question_id = '$id'";
	$result = mysqli_query($con, $sql);
	$answer = mysqli_fetch_array($result);
	mysqli_close($con);
?>
<body>
	<?php echo $answer['count']." Answer";?>
</body>