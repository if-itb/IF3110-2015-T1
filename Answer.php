<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php 
		function readQuestion($id_Question){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "stackexchange";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT Content, Vote, Email, Date FROM question WHERE ID_Question ='$id_Question'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				echo '<div class= "resQuestion">';
				echo "" . $row["Content"];
				echo "</div>";
				echo '<div class= "infoQuestion">';
				echo " asked by " . $row["Email"]. " at " . $row["Date"]. "<a href='#'>| edit |</a> ". "<a href='#'>| delete |</a>";
				echo "</div>";
			}
			} else {
				echo "0 results";
			}
			mysqli_close($conn);
			
		}
		
		function readAnswer($id_Question){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "stackexchange";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT Content, Vote, Email, Date FROM answer WHERE ID_Question ='$id_Question' ORDER BY date";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				echo '<div class="content">';
					echo '<div class="kotak">';
						echo "" . $row["Vote"];	
					echo '</div>';
				
					echo '<div class= "container-answer">';
						echo '<div class= "resAnswer">';
							echo "" . $row["Content"];
						echo "</div>";
						echo '<div class= "infoAnswer">';
							echo " asked by " . $row["Email"]. " at " . $row["Date"];
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
			} else {
				echo "0 results";
			}
			mysqli_close($conn);
			
		}
	?>
	
	<div class="container">
		<h1>Simple StackExchange</h1>
		<br><br><br>
		
		<div class="box1">
				<div class="SubTitle">
				<h2>The question topic goes here </h2>
				</div>
				<div class="kotak">
					1
				</div>
				<div class="content">
					<?php readQuestion( $_GET["id"]);?>
				</div>
		</div>
		<div class="box2">
				<div class="SubTitle">
				<h2>Answer</h2>
				</div>
				
				
					<?php readAnswer($_GET["id"]);?>
				
		</div>
		
		<div class="answerform">
		Your Answer
			<form action="add_answer.php" method="post">
				<input type="text" name="Name" placeholder="Name" >
				<input type="text" name="Email" placeholder="Email">
				<input type="hidden" name ="id-question" value="<?php echo $_GET["id"];?>"">
				<textarea placeholder= "Content" name="message"  ></textarea>
				<input class="button" type="submit" name="Post" value="Post">
			</form>
		</div>
	</div>	
</body>
</html>