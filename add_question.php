<?php

	/* Nama file 	: add_question.php */
	/* Nama/NIM		: Ahmad Darmawan (13513096) */
	/* Deskripsi	: File ini berfungsi untuk menambahkan atau mengedit pertanyaan ke dalam database */

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

	if ($_GET['id'] != 0) {
		$sql = "UPDATE question SET Name = '$Name', Email = '$Email', Topic = '$Topic', Content = '$Content', Date = CURRENT_TIME WHERE ID = '$_GET[id]' ";
	}
	else {
		$sql = "INSERT INTO question (`Name`, `Email`, `Topic`, `Content`) VALUES ('$Name','$Email', '$Topic','$Content')";
	}

	if (mysqli_query($conn, $sql)) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	header("Location: index.php");
?>