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

	$voteQuestionDownQuery = "update questions
							set questionvotes = questionvotes-1, questiondatetime = questiondatetime
							where questionid = ".$_POST["id"];
	$voteQuestionDownQuery = mysqli_query($connection, $voteQuestionDownQuery);

	$questionVoteQuery = "	select questionvotes
							from questions
							where questionid = ".$_POST["id"];
	$questionVoteResults = mysqli_query($connection, $questionVoteQuery);
	$questionVoteResult = mysqli_fetch_assoc($questionVoteResults);

	echo $questionVoteResult["questionvotes"];

	mysqli_close($connection);
?>