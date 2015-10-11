<?php

	require_once "connection.php";
	include "functions.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>StackExchange</title>

	<link href='https://fonts.googleapis.com/css?family=Titillium+Web|Source+Sans+Pro|Droid+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="js/validation.js"></script>
</head>

<body>
	<div class="container">
		<div class="header">
			<h1>
				<a href="index.php">Simple StackExchange</a>
			</h1>
		</div>
		
		<div class="wrapper">
			<form role="form" method="get" action="search-question.php" onsubmit="return validateForms()" class="search-bar">
				<input name="keyword" type="text" class="search-text" placeholder="Search question by topic or content">
				<input name="search-button" type="submit" value="Search" class="search-button">
			</form>

			<div class="title">
				<h3>Search result</h3>
			</div>

			<?php
				getSearchResult();
			?>

		</div>
	</div>
	
</body>
</html>