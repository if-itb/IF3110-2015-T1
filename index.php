<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='style.css'/>
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
					mysqli_query($con,"INSERT INTO question (name,email,questiontopic,content,vote,date,answer) 
					VALUES ('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[content]',0,NOW(),0)");

					mysqli_close($con);
				}
			}
		?>
	</head>
	<body>
	
		<div class="header">
			<div class="container">
				<p><a href="index.php">Simple StackExchange</a></p> 
			</div>
		</div>
		
		<div class="main">
			<div class="container">
				<form action="index.php" method="post" class="search">
					<input type="text" name="name">
					<input type="submit" value="Search">
				</form>
				<h6>Cannot find what you are looking for? <a href="question.php">Ask here</a></h6>
			</div>
			<div class="question">
				<h5>Recently Asked Questions</h5>
				<div class="listquestion">
					<?php
							$con = mysqli_connect("localhost","root","","wbd");
							
							// Check connection
							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							else
							{
								$sql = "SELECT * FROM question";
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {	
										echo '<div class="itemquestion">';
										echo '<div class="column left">'. $row["vote"].'<br>'.'<p>Votes</p>'.'</div>';
										echo '<div class="column left">'. $row["answer"].'<br>'.'<p>Answer</p>'.'</div>';
										echo '<div class="column center"><a href="answer.php?id='.$row["question_id"].'">'. $row["questiontopic"].'</a></div>';
										echo '<div class="column right">'. '<p>asked by '. $row["name"].'</p></div>';
										echo '</div>';
									}
								}
								mysqli_close($con);
							}
						
					?>
				</div>
			</div>
		</div>
	
	</body>
</html>