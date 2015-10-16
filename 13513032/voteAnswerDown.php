<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "database032";	// Nama database

	// Membuat koneksi
	$connection = mysqli_connect($servername, $username, $password, $database);

	// Mengecek koneksi
	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$voteAnswerDownQuery = "update answers
							set answervotes = answervotes-1, answerdatetime = answerdatetime
							where answerid = ".$_POST["aid"];
	$voteAnswerDownQuery = mysqli_query($connection, $voteAnswerDownQuery);

	$answerVoteQuery = "	select answervotes
							from answers
							where answerid = ".$_POST["aid"];
	$answerVoteResults = mysqli_query($connection, $answerVoteQuery);
	$answerVoteResult = mysqli_fetch_assoc($answerVoteResults);

	echo $answerVoteResult["answervotes"];

	mysqli_close($connection);
?>