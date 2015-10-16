<?php
	$dbHost = 'localhost:3306';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'question_answers';
	
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	
	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}
	
	
	if (isset($_POST['id']) && isset($_POST['type']) && isset($_POST['result'])) {
		$id = $_POST['id'];
		$type = $_POST['type'];
		$result = $_POST['result'];
		if($result == 'up')
			$count = 1;
		else
			$count = -1;
		$sql = "UPDATE $type SET vote = vote + $count WHERE id = $id";
		$result = mysqli_query($conn, $sql);
        $sql = "SELECT vote FROM $_POST[type] WHERE id = $_POST[id]";
	    $rq = mysqli_query($conn, $sql);
        $count = mysqli_fetch_array($rq, MYSQLI_ASSOC)['vote'];
        echo $count;
	}
	
			
?>

