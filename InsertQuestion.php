<?php
	function Home($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301:302); 
		exit(); 
	}

	include('dataBase.php'); 

	date_default_timezone_set("Asia/Bangkok");
	$Name    	= htmlspecialchars($_POST["name"]); 
	$Email	  	= htmlspecialchars($_POST["email"]); 
	$Topic		= htmlspecialchars($_POST["topic"]); 
	$Content	= htmlspecialchars($_POST["content"]); 
	$ID 		= htmlspecialchars($_POST["id"]); 
	$Today		= date("Y-m-d"); 

	$input 		= "INSERT INTO questions (Name, Email, Topic, Content, Date_Create) VALUES ('$Name','$Email','$Topic','$Content','$Today')";

	if ($conn -> query($input) === TRUE)
	{
		echo "New Record Successfully Record";
	}
	else { 
		echo "Error: ". $input . "<br>" . $conn-> error; 

	}
	header("Location: home.php");
	RedirectToHome('home.php', false);
	$conn -> close(); 


?>