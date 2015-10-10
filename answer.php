<!DOCTYPE html>
<html>
	<head>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$con = mysqli_connect("localhost","root","","wbd");
				
				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else
				{
					mysqli_query($con,"INSERT INTO answer (name,email,content,question_id,vote,date) 
					VALUES ('$_POST[name]','$_POST[email]','$_POST[content]',".$_GET["id"].",0,NOW())");

					mysqli_close($con);
				}
			}
		?>
		<link rel='stylesheet' href='style.css'/>
	</head>
	<body>
	
		<div class="header">
			<div class="container">
				<p><a href="index.php">Simple StackExchange</a></p> 
			</div>
		</div>
		
		<div class="main">
			<div class="container">
				<?php
					$con = mysqli_connect("localhost","root","","wbd");
					// Check connection
					if (mysqli_connect_errno())
					{
						 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					else{
						
						$sql = "SELECT * FROM question WHERE question_id=".$_GET["id"];
						$result = $con->query($sql);

						if ($result->num_rows > 0) {	
							while($row = $result->fetch_assoc()) {	
								echo "<div>";
								echo "<h1>".$row["questiontopic"]."</h1>";
								echo "<p>".$row["content"]."</p>";
								
								echo "</div>";
							}
						}
						
						echo "<div>";
						echo "<h1>".$row["answer"]." Answer</h1>";
						$anssql = "SELECT * FROM answer WHERE question_id=".$_GET["id"];
						$ansresult = $con->query($anssql);

						if ($ansresult->num_rows > 0) {	
							while($row = $ansresult->fetch_assoc()) {	
								echo "<div class='answer'>";
								echo "<p>".$row["content"]."</p>";
								
								echo "</div>";
							}
						}
						echo "</div>";
						
						mysqli_close($con);
					}
				
				?>
				<div>
					<h3>Your Answer</h3>
					<?php echo '<form action="answer.php?id='.$_GET["id"]. '" method="post" class="form">' ?>
						<input type="text" name="name" placeholder="Name"><br>
						<input type="text" name="email" placeholder="Email"><br>
						<textarea name="content" placeholder="Content"></textarea>
						<input type="submit" value="Post">
					</form>
				</div>
			</div>
		</div>
	
	</body>
</html>