<!DOCTYPE  html>
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
		<form>
			<input id="searchbox" type="text" name="searchQuery"> <input id="submitbutton" type="submit" value="Search"> <br>
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