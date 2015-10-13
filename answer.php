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
		
		$qid = $_GET["id"];
		$sqlquestion = "SELECT * FROM question WHERE question.QID = $qid";
		$sqlanswer = "SELECT * FROM answer WHERE answer.QID = $qid";
		
		$resultquestion = $conn->query($sqlquestion);
		$resultanswer = $conn->query($sqlanswer);
		
		if ($resultquestion->num_rows > 0) {
			// output data of each row
			while($row = $resultquestion->fetch_assoc()) {
				echo'
				  <h2>'.$row["Topik"].'</h2>
				  <div class="thread">
					<div class="row">
					  <div class="span-1">
						<div class="arrow-up"></div>
						<div class="text-center">
						  <h2>(Jumlah Votes)</h2>
						</div>
						<div class="arrow-down"></div>
					  </div>
					  <div class="span-9">
						<div>
						  '.$row["Content"].'
						</div>
						<p class="text-right footer">
						  Asked by '.$row["Email"].' at <datetime> | <a href>Edit</a> | <a href>Delete</a>
						</p>
					  </div>
					</div>
				  </div>
				';
			}
		} else {
			echo "<h2>0 Question</h2>";
		}
		if ($resultanswer->num_rows > 0) {
			// output data of each row
			echo "<h2>(Jumlah Answer) Answer</h2>";
			while($row = $resultanswer->fetch_assoc()) {
				echo'
				  <div class="thread">
					<div class="row">
					  <div class="span-1">
						<div class="arrow-up"></div>
						<div class="text-center">
						  <h2>(Jumlah Votes)</h2>
						</div>
						<div class="arrow-down"></div>
					  </div>
					  <div class="span-9">
						<div>
						  '.$row["Content"].'
						</div>
						<p class="text-right footer">
						  Answered by '.$row["Email"].' at <datetime>
						</p>
					  </div>
					</div>
				  </div>
				';
			}
		} else {
			echo "<h2>0 Answer</h2>";
		}
		$conn->close();
		
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