<?php
	$link = mysqli_connect("127.0.0.1","root","","wbd");
	if (!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	if (isset($_GET["id"])){
		$sql = "UPDATE answer SET Vote = Vote + 1 WHERE IDAns = '$_GET[id]'";
		if(mysqli_query($link,$sql)){
			
		}
	}
	$sql = "SELECT Vote From answer WHERE IDAns = '$_GET[id]'";
	$retval = mysqli_query($link,$sql);
	if(!$retval){
		throw new My_Db_Exception ('Database error: ' . mysql_error());
	}
	if ($row = $retval->fetch_assoc()){	
		echo $row['Vote'];
	}
	mysqli_close($link);
?>