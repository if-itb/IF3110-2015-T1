<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: submitAnswer.php
// Keterangan	: Berisi kode php untuk memasukkan jawaban ke database

	function RedirectToAnswers($url, $permanent = false)
	{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
	}

	//SubmitQuestions.php
	include('ConnectDatabase.php');
	include('stringProcessing.php');

	$Quest_ID = $_GET["id"];
	date_default_timezone_set("Asia/Bangkok");
	$Name = htmlspecialchars($_POST["name"]);
	$Email = htmlspecialchars($_POST["email"]);
	$Temp_Content = htmlspecialchars($_POST["content"]);
	$Content = getValidString($Temp_Content);
	$Today = date("Y-m-d G:i:s");

	$input = "INSERT INTO Answers (`Name`, `Email`, `Content`, `Question_ID` ,`Date_Created`) VALUES ('$Name','$Email', '$Content','$Quest_ID','$Today')";

	if ($conn->query($input) === TRUE) 
	{
    	//echo "New record created successfully";
	} else {
    	echo "Error: " . $input . "<br>" . $conn->error;
	}
	$AnswerPage = "Answers.php?id=".trim($Quest_ID);
	
	RedirectToAnswers($AnswerPage, false);
	$conn->close();
?>