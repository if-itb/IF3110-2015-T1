<?php
	include("connect-mysql.php");
	$name = $_POST["name"];
	$email = $_POST["email"];
	$topic = $_POST["topic"];
	$content = $_POST["content"];

	$result = mysqli_query($con,"INSERT INTO questions (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')");
	if(! $result ){
		die('Could not insert data: ' . mysql_error());
	}

	mysqli_close($con);
?>

<script type="text/javascript">
   document.location="../index.php";
</script>