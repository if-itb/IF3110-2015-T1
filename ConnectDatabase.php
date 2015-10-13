<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: ConnectDatabase.php
// Keterangan	: Berisi kode php untuk menyambungkan koneksi ke database

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "simplestackexchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn)
	{
    	die("Connection failed: " . mysqli_connect_error());
	}
?>