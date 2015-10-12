<?php
	function Home($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301:302); 
		exit(); 
	}

	include('dataBase.php'); 

	date_default_timezone_set("Asia/Bangkok");
	$Name    	= ($_POST["name"]); 
	$Email	  	= ($_POST["email"]); 
	$Topic		= ($_POST["topic"]); 
	$Content	= ($_POST["content"]); 
	$ID 		= ($_POST["id"]); 
	$Today		= date("Y-m-d"); 

	$sql = "UPDATE questions SET  Name = '$Name', Email = '$Email' , Topic = '$Topic' , Content = '$Content' WHERE ID = '$ID' " ; 
	/*$input 		= "UPDATE questions SET  Name = '$Name', Email = '$Email' , Topic = $Topic , Content = $Content, Date_Create = '$Today' WHERE ID = '$ID' " ; */
	$result = mysqli_query($conn,$sql); 
	if (!($result)) {
		die("Invalid query: ".mysql_error()); 
	}
	else { 
		header("Location: home.php");
	}
	/*if ($conn -> query($sql) === TRUE)
	{
		echo "New Record Successfully Record";
	}
	else { 
		echo "Error: ". $input . "<br>" . $conn-> error; 

	}
	header("Location: home.php");*/
	//RedirectToHome('home.php', false);
	$conn -> close(); 


?>