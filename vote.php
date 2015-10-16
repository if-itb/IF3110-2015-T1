<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";
	$Type= $_POST['type'];
	$flag= $_POST['flag'];
	$id= $_POST['id'];
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else{
		if($Type== "question"){
			if($flag==0){//vote up
				$input = mysqli_query($conn, "UPDATE question SET Vote= Vote+1 WHERE ID_Question = '$id'") or die(mysql_error());
			}else{//vote down
				$input = mysqli_query($conn,"UPDATE question SET Vote= Vote-1 WHERE ID_Question = '$id'") or die(mysql_error());
			}
			$sql = "SELECT Vote FROM question WHERE  ID_Question =" . $id;
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			echo $row["Vote"];
		}else{//answer
			if($flag==0){//vote up
				$input = mysqli_query($conn,"UPDATE answer SET vote= vote+1 WHERE ID_Answer = '$id'") or die(mysql_error());
			}else{//vote down
				$input = mysqli_query($conn,"UPDATE answer SET vote= vote-1 WHERE ID_Answer = '$id'") or die(mysql_error());
			}
			$sql = "SELECT Vote FROM answer WHERE  ID_Answer =" . $id;
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			echo $row["Vote"];
		}
		
		
	}
	
?>