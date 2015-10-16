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

	$voteAnswerUpQuery = "update answers
							set answervotes = answervotes+1, answerdatetime = answerdatetime
							where answerid = ".$_POST["aid"];
	$voteAnswerUpQuery = mysqli_query($connection, $voteAnswerUpQuery);

	$answerVoteQuery = "	select answervotes
							from answers
							where answerid = ".$_POST["aid"];
	$answerVoteResults = mysqli_query($connection, $answerVoteQuery);
	$answerVoteResult = mysqli_fetch_assoc($answerVoteResults);

	echo $answerVoteResult["answervotes"];

	mysqli_close($connection);
?>