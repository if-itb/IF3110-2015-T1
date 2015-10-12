<?php
include 'connect.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sql="UPDATE question SET Q_Vote=(Q_Vote+1) WHERE Q_ID = '".$id."'";
	mysqli_query($conn, $sql);
	$q = "SELECT
	              *
	          FROM
	              `question`
	          WHERE
	              `Q_ID` = '$id'";
	$s = mysqli_query($conn, $q) or die(mysqli_error());
	$result = mysqli_fetch_assoc($s);
	echo $result['Q_Vote'];
?>