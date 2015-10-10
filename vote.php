<?php
	require_once('database.php');

	if (isset($_POST['action']) && isset($_POST['id']) && isset($_POST['db'])) {
		$c = ($_POST['action'] == 'up') ? 1 : -1;
		vote($_POST['db'], $_POST['id'], $c);
		echo "<font size = \"5\" color =\"blue\">" . getVoteCount($_POST['db'], $_POST['id']) . "</font>";
	}
?> 
