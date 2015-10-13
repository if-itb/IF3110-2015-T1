<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: delete.php
// Keterangan	: Berisi kode php untuk memasukkan pertanyaan ataupun mengeditnya dari database

	function RedirectToHome($url, $permanent = false)
	{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
	}

	function RedirectToAnswers($url, $permanent = false)
	{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
	}

	//SubmitQuestions.php
	include('ConnectDatabase.php');
	include('stringProcessing.php');

	date_default_timezone_set("Asia/Bangkok");
	$Name = htmlspecialchars($_POST["name"]);
	$Email = htmlspecialchars($_POST["email"]);
	$Topic = htmlspecialchars($_POST["topic"]);
	$Temp_Content = htmlspecialchars($_POST["content"]);
	$Content = getValidString($Temp_Content);
	$Today = date("Y-m-d G:i:s");
	$id = $_GET['id'];

	if ($id == 0)
	{
		$input = "INSERT INTO Questions (`Name`, `Email`, `Topic`, `Content`, `Date_Created`) VALUES ('$Name','$Email', '$Topic','$Content', '$Today')";
	}
	else {
		$input = "UPDATE Questions SET Name = '$Name', Email = '$Email', Topic = '$Topic', Content = '$Content', Date_Created = '$Today' WHERE ID = '$id' ";
	}

	if ($conn->query($input) === TRUE) 
	{
		//echo "New record created successfully";
	} else {
		echo "Error: " . $input . "<br>" . $conn->error;
	}
	echo $id;
	if ($id == 0)
	{
		RedirectToHome('home.php', false);
	} else {
		$AnswerPage = "Answers.php?id=".trim($id);
		RedirectToAnswers($AnswerPage, false);
	}
	
	$conn->close();
?>