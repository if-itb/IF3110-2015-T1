<?php
	require_once('dbconnect.php');
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// collect value of input field
		$id = $_GET['id'];
		$sql = "DELETE FROM question
				WHERE
					id='$id'";
		$conn->query($sql);
		$conn->close();
	}
	header("Location: {$_SERVER['HTTP_REFERER']}"); 
	exit;
?>