<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type = "text/javascript" src="javascript/validatequestion.js"> </script>
  </head>
  <body>
    <div class="container">
      <a href="index.php" class="home text-center"><h1>Simple StackExchange</h1></a>
      <h2>What's Your Question?</h2>
      <hr>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		echo'
		  <form name="question" action="questiondata.php" onsubmit="return validateForm()" method="Post">
		  <input type="text" class="form" placeholder="Name" name="Name">
		  <input type="text" class="form" placeholder="Email" name="Email">
		  <input type="text" class="form" placeholder="Question Topic" name="Topik">
		  <textarea class="form" placeholder="Content" rows="5" name="Content"></textarea>
		  <div class="text-right">
			<button class="btn" type="submit">Post</button>
		  </div>
		';
	?>
    </div>
  </body>
</html>