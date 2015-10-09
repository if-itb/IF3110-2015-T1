<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbmy";
	
	// create connection
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	// check connection
	if(!$conn){
		die("Connection failed: " .mysqli_connect_error());
	}
	
	$nama = $_POST['nama'];
	$email = $_POST['email']; 
	$konten = $_POST['jawaban'];
	$nopertanyaan = $_POST['nama'];
	$id = $_GET['id'];
	
	$sql = "INSERT INTO answer (no_pertanyaan,name,email,konten,vote) VALUES ($id,'$nama','$email','$konten',0)";
	
	if(mysqli_query($conn,$sql)){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	header("location: showanswer.php?id=".$id);
?>