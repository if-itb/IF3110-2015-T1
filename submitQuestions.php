<?php
	function RedirectToHome($url, $permanent = false)
	{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
	}	

	//SubmitQuestions.php
	include('ConnectDatabase.php');

	date_default_timezone_set("Asia/Bangkok");
	$Name = htmlspecialchars($_POST["name"]);
	$Email = htmlspecialchars($_POST["email"]);
	$Topic = htmlspecialchars($_POST["topic"]);
	$Content = htmlspecialchars($_POST["content"]);
	$Today = date("Y-m-d");

	$input = mysql_query("INSERT INTO Questions (`Name`, `Email`, `Topic`, `Content`, `Date_Created`) VALUES ('$Name','$Email', '$Topic','$Content', '$Today')");

	/*if ($conn->query($sql) === TRUE) 
	{
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
	
	RedirectToHome('home.php', false);
	$conn->close();
?>