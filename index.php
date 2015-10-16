<!DOCTYPE html>

<!-- Nama File 		: index.php
	 Nama/NIM		: Ahmad Darmawan (13513096) 
	 Deskripsi		: File ini adalah halaman utama yang menampilkan berbagai pertanyaan yang ada -->

<html>

<head>
	<title>Home - Simple StackExchange</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="header-page">
		<h1><a href="index.php">Simple StackExchange</a></h1>
	</div>

	<div class="search-form">
		<form>
			<input id="search-bar" name="search-bar" type="text" placeholder="What are you looking for?">
			<input id="search-button" name="search-button" type="submit" value="Search">
		</form>
	</div>
	<p>Cannot find what you are looking for? <a href="question.php" id="ask-here">Ask Here </a></p>
	<h3>Recently Asked Question</h3>
	<hr>

	<div class="list-question">
	<?php
		include("list_question.php");
	?>
	</div>
</body>
</html>