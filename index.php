<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type = "text/javascript" src="javascript/validatedelete.js"> </script>
	<script type = "text/javascript" src="javascript/validatesearch.js"> </script>
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
		
		$sql = "SELECT * FROM question ORDER BY QID DESC";
		$result = $conn->query($sql);
	 
			echo'
			<form name="Searchquestion" action="search.php" onsubmit="return validateSearch()" method="Post">
				<div class="row">
				  <div class="span-8 span-offset-1">
					<div class="span-8">
					  <input type="text" class="form" placeholder="Search your question" name="Search">
					</div>
					<div class="span-1">
					  <button class="btn" type="submit">Search</button>
					</div>
				  </div>
				</div>
			</form>
				<div class="text-center">
				<p>
				  Cannot find what you are looking for? <a href="question.php" class="golden">Ask Here</a>
				</p>
				</div>
				<h2>Recently Asked Question</h2>
			';
			
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo'
				<div class="thread">
				  <div class="row">
				    <div class="span-1">
				      <h4 class="text-center">'.$row["Vote"].'</h4>
					  <h4 class="text-center">Votes</h4>
				    </div>
				  <div class="span-1">';
					$sqlanswer = "SELECT * FROM answer WHERE answer.QID = '$row[QID]'";
					$resultanswer = $conn->query($sqlanswer);
					$countanswer = mysqli_num_rows($resultanswer);
					echo'
					<h4 class="text-center">'.$countanswer.'</h4>
					<h4 class="text-center">Answer</h4>
				  </div>
				  <div class="span-8">
					<p><b>
					  <a href="answer.php?id='.$row["QID"].'" class="topik">'.$row["Topik"].'</a>
					</b></p>
					<br>';
					  echo substr($row["Content"], 0, 40);
					  if(strlen($row["Content"]) > 40){
						  echo ".....";
					  }
					echo'
					</br>
					<p class="text-right footer">
					  asked by <blue>'.$row["Email"].'</blue> | <a href="edit.php?id='. $row["QID"].'" class="edit">edit</a> | <a href="deletedata.php?id='. $row["QID"].'" class="delete"onclick="return confirmDelete()">delete</a>
					</p>
				  </div>
				</div>
				';
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	  ?>
    </div>
  </body>
</html>