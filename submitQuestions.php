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
	$id = $_GET['id'];

	if ($id == 0)
	{
		$input = "INSERT INTO Questions (`Name`, `Email`, `Topic`, `Content`, `Date_Created`) VALUES ('$Name','$Email', '$Topic','$Content', '$Today')";
	}
	else {
		$input = "UPDATE Questions SET Name = '$Name', Email = '$Email', Topic = '$Topic', Content = '$Content' WHERE ID = '$id' ";
	}

	if ($conn->query($input) === TRUE) 
	{
		//echo "New record created successfully";
	} else {
		echo "Error: " . $input . "<br>" . $conn->error;
	}
	echo $id;
	RedirectToHome('home.php', false);
	$conn->close();
?>