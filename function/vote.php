<?php
	$servername = "localhost";
	$username = "Fikri";
	$password = "";
	$dbname = "mydata";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$id = $_POST['id'];
	$qa = "";
	$ud = "";

	if ($_POST['ud'] === "up") {
	    $ud = "+1";
	} else {
	    $ud = "-1";
	}
	$qaid = "id";
	if ($_POST['qa'] === "question") {
	    $qa = "question";
	} else {
	    $qa = "answer";
	}

	$vote = "UPDATE $qa SET vote = vote $ud WHERE $qaid = $id";
	$conn->query($vote);
	$select = "SELECT vote FROM $qa WHERE $qaid = $id";
	$result = $conn->query($select);
	$count = $result->fetch_array(MYSQLI_ASSOC)['vote'];

	echo $count;
?>