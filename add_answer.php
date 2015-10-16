<?php

	/* Nama file 	: add_answer.php */
	/* Nama/NIM		: Ahmad Darmawan (13513096) */
	/* Deskripsi	: File ini berfungsi untuk menambahkan jawaban ke dalam database */

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

	$QID = $_GET["id"];
	$Name = htmlspecialchars($_POST["name"]);
	$Email = htmlspecialchars($_POST["email"]);
	$Content = htmlspecialchars($_POST["content"]);

	$sql = "INSERT INTO answer (`Que_ID`, `Name`, `Email`, `Answer`) VALUES ('$QID','$Name', '$Email','$Content')";

	if (mysqli_query($conn, $sql)) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	header("Location: answer.php?id=".trim($QID));
?>