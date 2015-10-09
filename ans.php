<?php
	include "connect.php"; 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  
	    $name = $_POST["name"];
	    $email = $_POST["email"];
	    $content = $_POST["content"];

	}

	//echo htmlspecialchars($_SERVER["PHP_SELF"]);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	date_default_timezone_set('Asia/Jakarta');
	$datetime = date('Y/m/d h:i:s a', time());
	$sql = "INSERT INTO answer (A_Name,Q_ID, A_Email, A_Content, A_Datetime) VALUES
	 ('$name', '$id', '$email','$content','$datetime')";
	if (mysqli_query($conn, $sql)) {

		$sql = "UPDATE question SET Q_SumAns=(Q_SumAns+1) WHERE Q_ID='$id'";
	    if (mysqli_query($conn, $sql)) {
	    	header('Location: question.php?id='.$id);    
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
	  
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?> 