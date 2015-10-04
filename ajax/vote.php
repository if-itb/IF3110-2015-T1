<?php
	require_once('../includes/mysql.php');

	if (isset($_POST['action']) && isset($_POST['id']) && isset($_POST['db'])) {
		$c = ($_POST['action'] == 'up') ? 1 : -1;
		vote($_POST['db'], $_POST['id'], $c);
		echo getVoteCount($_POST['db'], $_POST['id']);
	}
?>