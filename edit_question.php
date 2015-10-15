<?php

	if(isset($_GET['id']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stack_exchange";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn)
		{
	    	die("Connection failed: " . mysqli_connect_error());
		}

		$id = $_GET["id"]; 
		$sql = "SELECT * FROM question WHERE ID = '$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$Name	= $row["Name"];
		$Email 	= $row["Email"];
		$Topic	= $row["Topic"];
		$Content= $row["Content"];
	}
	else
	{
		$id= 0;
		$Name	= "";
		$Email 	= "";
		$Topic	= "";
		$Content= "";
	}
?>