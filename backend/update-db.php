<?php
	include("connect-mysql.php");
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];
	$id = $_POST["id"];

	$result = mysqli_query($con, "UPDATE questions SET name='$name', email='$email', topic='$topic', content='$content' WHERE id=$id");
	if(! $result ) {
		die('Could not update data: ' . mysql_error());
	}
	
	mysqli_close($con);
?>

<script type="text/javascript">
   document.location="../index.php";
</script>