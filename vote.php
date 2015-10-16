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
	
	$id = intval($_GET['id']);
	$type = $_GET['type'];
	$arah = $_GET['arah'];
	$idjawaban = intval($_GET['idjawaban']);
	
	if ($type == "pertanyaan"){
		$sql = "SELECT * FROM question WHERE No=$id";
		$pertanyaan = mysqli_query($conn,$sql);
		$row_pertanyaan = mysqli_fetch_assoc($pertanyaan);
		$jumlah = $row_pertanyaan['vote'];
	} else if($type == "jawaban"){
		$sql = "SELECT * FROM answer WHERE no_pertanyaan=$id AND no_jawaban=$idjawaban";
		$jawaban = mysqli_query($conn,$sql);
		$row_jawaban = mysqli_fetch_assoc($jawaban);
		$jumlah = $row_jawaban['vote'];
	}
	
	if($arah == "atas") $jumlah++;
	else if($arah == "bawah")$jumlah--;
	
	if($type == "pertanyaan"){
		$sql = "UPDATE question SET vote=$jumlah WHERE No=$id";
	} else if($type == "jawaban"){
		$sql = "UPDATE answer SET vote=$jumlah WHERE no_pertanyaan=$id AND no_jawaban=$idjawaban";
	}
	
	if(mysqli_query($conn,$sql)){
		echo "$jumlah";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>