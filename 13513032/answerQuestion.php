<!DOCTYPE html>

<html>
	<head>
		<title> - Simple StackExchange</title>
		<link href="style.css" rel="stylesheet" type="text/css"></link>
	</head>

	<body>
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
		?>

		<h1><a href="index.php" style="color:black">Simple StackExchange</a></h1>
		<h2>The question topic goes here</h2>
		<p class="questionBoundary"></p>

		<p style="margin-top:0px">
			<voteupdown>&#9650 0 &#9660</voteupdown>
			<content>The question content goes here.</content>
		</p>

		<p class="askedAnsweredBy">
			asked by username at datetime|<b><span style="color:orange">edit</span>|<span style="color:red">delete</span></b>
		</p>

		<h2>0 Answer</h2>
		<p class="questionBoundary"></p>

		<p style="margin-top:0px">
			<voteupdown>&#9650 0 &#9660</voteupdown>
			<content>The answer content goes here.</content>
		</p>

		<p class="askedAnsweredBy">answered by username at datetime</p>
		<p style="margin-top:60px"></p>
		<p class="questionBoundary"></p>
		<h2 style="margin-top:15px"><span style="color:grey">Your Answer</span></h2>
		<form style="margin-top:-7px">
			<input class="askQuestionData" placeholder="Name" type="text"></input>
			<input class="askQuestionData" placeholder="Email" type="text"></input>
			<textarea placeholder="Content" rows="9"></textarea>
			<input id="postButton" type="button" value="Post"></input>
		</form>
	</body>
</html>