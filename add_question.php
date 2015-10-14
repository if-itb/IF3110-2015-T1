<?php

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

	$Name = htmlspecialchars($_POST["name"]);
	$Email = htmlspecialchars($_POST["email"]);
	$Topic = htmlspecialchars($_POST["topic"]);
	$Content = htmlspecialchars($_POST["content"]);
	date_default_timezone_set("Asia/Bangkok");
	$NowTime = date("Y-m-d G:i:s");

	$sql = "INSERT INTO question (`Name`, `Email`, `Topic`, `Content`, `Date`) VALUES ('$Name','$Email', '$Topic','$Content', '$NowTime')";

	if (mysqli_query($conn, $sql)) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	header("Location: index.php");
?>