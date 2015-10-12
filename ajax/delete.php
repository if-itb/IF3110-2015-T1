<?php
	$db = new mysqli('localhost','root','','StackExchange');
	
	if (isset($_POST['id']) && $_POST['id'] != 0) {
		$sql = "DELETE from question WHERE id= $_POST[id]";
		$rq = mysqli_query($db,$sql);
	}
?>