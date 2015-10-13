<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
  <body>
    <div class="container">
      <a href="index.php" class="home text-center"><h1>Simple StackExchange</h1></a>
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
		  <hr>
		  <h2>Your Answer</h2>
		  <input type="text" class="form" placeholder="Name">
		  <input type="text" class="form" placeholder="Email">
		  <textarea class="form" placeholder="Content" rows="5"></textarea>
	   	  <div class="text-right">
		    <button class="btn" type="submit">Post</button>
		  </div>
		';
	  ?>
    </div>
  </body>
</html>