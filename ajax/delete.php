<?php
	$conn = mysql_connect('localhost', 'root', '08161955342');
	mysql_select_db('simplestackexchange', $conn);
	
	if (isset($_POST['id']) && $_POST['id'] != 0) {
		$id = $_POST['id'];
		$sql = "DELETE from question WHERE id=$id";
		$result = mysql_query($sql);
	}

	mysql_close($conn);
?>