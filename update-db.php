<?php
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];
	$id = $_POST["id"];

	require("connect_mysql.php");

	$result = mysql_query("UPDATE questions SET name='$name', email='$email', topic='$topic', content='$content' WHERE id=$id");
	if(! $result )
	{
	  die('Could not update data: ' . mysql_error());
	}
?>

<script type="text/javascript">
   document.location="index.php";
</script>