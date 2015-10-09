<?php
	required_once('../includes/mysql.php);
	if(isset($_POST['db']) && isset($_POST['id']) && isset($_POST['action'])){
		if ($_POST['action'] == 'up')
			vote ($_POST['db'], $_POST['id'], 1);
		else 
			vote ($_POST['db'], $_POST['id'], -1);
	echo getVoteCount($_POST['db'], $_POST['id']);
	}
?>