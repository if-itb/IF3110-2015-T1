<?php
	$servername = "localhost";
	$username = "webuser";
	$password = "webpass";
	$dbname = "simple_stackexchange";
	$tablename = "Question";
	
	// Create connection
	$link = mysqli_connect($servername, $username, $password);
	
	if (!$link) {
		die('Could not connect: ' . mysqli_error());
	}
	
	echo 'MySQL Connected successfully';
	$db_selected = mysqli_select_db($link, $dbname);
	if (!$db_selected) {
		die('Database not selected: ' . mysqli_error());
	}
	
	$sql = "DELETE FROM " . $tablename . " WHERE id=".$_GET["id"];
	if (mysqli_query($link, $sql)) {
		echo "Question deleted successfully";
		header("Location: index.php");
		exit;
	}
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($link);
	}
	
	mysql_close($link);
?>
