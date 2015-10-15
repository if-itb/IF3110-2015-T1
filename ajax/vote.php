<?php
	require_once('../includes/mysql.php');
	if(isset($_POST['action']) && isset($_POST['id']) && isset($_POST['db'])){
		if ($_POST['action'] == 'up')
			vote ($_POST['db'], $_POST['id'], 1);
		else 
			vote ($_POST['db'], $_POST['id'], -1);
	echo getVoteCount($_POST['db'], $_POST['id']);
	}
?>