<?php
	require_once('database.php');

	if (isset($_POST['id'])) {
		deleteQuestion($_POST['id']);
	}
?> 
