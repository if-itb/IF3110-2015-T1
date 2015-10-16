<?php
	include("connect-mysql.php");
	$id = $_GET["id"];

	$query = "DELETE FROM questions WHERE id=$id";
	$result = mysqli_query($con, $query);
	if(! $result ) {
		die('Could not delete data: ' . mysql_error());
	}

	mysqli_close($con);
?>

<script type="text/javascript">
   document.location="../index.php";
</script>