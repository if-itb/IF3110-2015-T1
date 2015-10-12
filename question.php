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
	
	if(empty($_GET['id'])){
		$sql = "INSERT INTO question (name,email,topik,konten,vote) VALUES ('". $_POST['nama'] ."','". $_POST['email'] ."','". $_POST['topikpertanyaan'] ."','". $_POST['pertanyaan'] ."',0)";
		$location = "showquestion.php";
	}
	else{
		$id=$_GET['id'];
		$withanswer = $_GET['withanswer'];
		if(!empty($_GET['delete'])){
			$sql1 = "DELETE FROM answer WHERE no_pertanyaan=$id";
			if(mysqli_query($conn,$sql1)){
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			$sql = "DELETE FROM question WHERE No=$id";
			$location = "showquestion.php";
		} else {
			$sql = "UPDATE question SET konten='".$_POST['pertanyaan']."' WHERE No=$id";
			if($withanswer == "false"){
				$location = "showquestion.php";
			}else if($withanswer == "true"){
				$location = "showanswer.php?id=".$id;
			}
		}
	}

	if(mysqli_query($conn,$sql)){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
		
	mysqli_close($conn);
	header("location: ".$location);
?>