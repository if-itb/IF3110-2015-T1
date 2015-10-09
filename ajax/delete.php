<?php
	require_once('../includes/mysql.php');
	if (isset($_POST['id'])) {
		deleteQuestion($_POST['id']);
	}
?