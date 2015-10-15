<?php
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];

	require("connect_mysql.php");

	$result = mysql_query("INSERT INTO questions (name, email, topic, content) VALUES ('$name', '$email', '$topic', 'content')");
	if(! $result )
	{
	  die('Could not insert data: ' . mysql_error());
	}
?>

<script type="text/javascript">
   document.location="index.php";
</script>