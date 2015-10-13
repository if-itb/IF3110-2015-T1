<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <a href="index.php" class="home text-center"><h1>Simple StackExchange</h1></a>
      <div class="row">
        <div class="span-8 span-offset-1">
          <div class="span-8">
            <input type="text" class="form">
          </div>
          <div class="span-1">
            <button class="btn">Search</button>
          </div>
        </div>
      </div>
      <div class="text-center">
        <p>
          Cannot find what you are looking for? <a href="question.php">Ask Here</a>
        </p>
      </div>
	  <h2>Recently Asked Question</h2>
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
	  ?>
    </div>
  </body>
</html>