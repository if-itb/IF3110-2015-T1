<?php
	function RedirectToAnswers($url, $permanent = false)
	{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
	}

	//SubmitQuestions.php
	include('ConnectDatabase.php');

	$Quest_ID = $_GET["id"];
	date_default_timezone_set("Asia/Bangkok");
	$Name = htmlspecialchars($_POST["name"]);
	$Email = htmlspecialchars($_POST["email"]);
	$Content = htmlspecialchars($_POST["content"]);
	$Today = date("Y-m-d");

	$input = "INSERT INTO Answers (`Name`, `Email`, `Content`, `Question_ID` ,`Date_Created`) VALUES ('$Name','$Email', '$Content','$Quest_ID','$Today')";

	if ($conn->query($input) === TRUE) 
	{
    	//echo "New record created successfully";
	} else {
    	echo "Error: " . $input . "<br>" . $conn->error;
	}
	$AnswerPage = "Answers.php?id=" + $Quest_ID;
	
	echo "Answerpage: '$AnswerPage'";
	RedirectToAnswers($AnswerPage, false);
	$conn->close();
?>