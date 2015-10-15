<?php
	require 'functions.php';

	$ID = $_GET['ID'];
	$table = $_GET['table'];
	$x = $_GET['x'];

	$conn = get_connectqa();
	echo "lalala";
	$result = mysqli_query($conn,"UPDATE $table SET Votes=Votes+$x WHERE ID = $ID");
	echo $table;
?>