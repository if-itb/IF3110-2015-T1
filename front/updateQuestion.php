<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>

    <link rel="stylesheet" type="text/css" href="../css/question.css">
	<script type = "text/javascript" src="../js/validateupdate.js"> </script>
  </head>
  <body>
		<div class="container">
		 <h1 class="align-center margin-bot"><a class="text-link" href="index.php"><black>Simple StackExchange</black></a></h1>

		  <h2>What's Your Question?</h2>
		  	<?php
			$conn = mysqli_connect("localhost","root","","stackExchange");
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$currentq = $_GET["id"];
			$sql = "SELECT * FROM question where QID = '$currentq'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			echo'
			  <hr>
				<form name="updateQuestion" action="update-question.php?id='.$currentq.'" onsubmit="return validateForm()" method = "Post">
				  <input type="text" class="form"  name="Name" value='.$row["Name"].'>
				  <input type="text" class="form" value='.$row["Email"].' name="Email"> 
				  <input type="text" class="form" value='.$row["Topic"].' name="Topic">
				  <textarea class="form"  rows="5" name="Content">'.$row["Content"].'</textarea>
				  <div class="align-right"> 
					<button class="button">Post</button>
				  </div>
				</form>';
			?>
	</div>	
  </body>
</html>