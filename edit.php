<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type = "text/javascript" src="javascript/validateedit.js"> </script>
  </head>
  <body>
    <div class="container">
      <a href="index.php" class="home text-center"><h1>Simple StackExchange</h1></a>
      <h2>Edit Your Question?</h2>
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
		$qid = $_GET["id"];
		$sql = "SELECT * FROM question where QID = '$qid'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo'
		  <form name="edit" action="editdata.php?id='.$qid.'" onsubmit="return validateForm()" method="Post">
		  <input type="text" class="form"  name="Name" value='.$row["Name"].'>
		  <input type="text" class="form" value='.$row["Email"].' name="Email"> 
		  <input type="text" class="form" value='.$row["Topik"].' name="Topik">
		  <textarea class="form"  rows="5" name="Content">'.$row["Content"].'</textarea>
		  <div class="text-right">
			<button class="btn" type="submit">Post</button>
		  </div>
		';
	?>
    </div>
  </body>
</html>