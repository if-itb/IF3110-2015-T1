<!DOCTYPE  html>

<!-- Nama		: Ryan Yonata
	 NIM		: 13513074
	 Nama file 	: home.php
	 Keterangan	: Halaman utama, berisi header dan list pertanyaan -->
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
</head>

<body>
	<div class="pageheader">
		<h1>Simple StackExchange</h1>
		<br>
	</div>
	<div class="search">
		<form method="POST" action="Search.php">
			<input id="searchQuery" type="text" name="searchQuery" placeholder="Search...">
			<input id="submitbutton" type="submit" value="Search"> <br>
		</form>
	</div>
	<?php include('getQID.php') ?>
	<p>Cannot find what you are looking for? <a href="askform.php?id=0" id="askhere"> Ask here </a></p>
	<br>
	<h3>Recently Asked Question</h3>
	<div class="linehome"> <hr> </div>
	<?php
		include("QuestionsList.php");
	?>
</body>
</html>