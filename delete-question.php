<?php
	$id = $_GET["id"];
	
	require("connect_mysql.php");

	$result = mysql_query("DELETE FROM questions WHERE id=$id");
	if(! $result )
	{
	  die('Could not delete data: ' . mysql_error());
	}
?>

<script type="text/javascript">
   document.location="index.php";
</script>