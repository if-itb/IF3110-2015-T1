<?php
	include 'connect.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sql="UPDATE answer SET A_Vote=(A_Vote-1) WHERE A_ID = '".$id."'";
	mysqli_query($conn, $sql);
	$q = "SELECT
	              *
	          FROM
	              `answer`
	          WHERE
	              `A_ID` = '$id'";
	$s = mysqli_query($conn, $q) or die(mysqli_error());
	$result = mysqli_fetch_assoc($s);
	echo $result['A_Vote'];
?>