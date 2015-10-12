<!DOCTYPE html>
<html>
	<head>
        
        <script>
        function validateForm() {
           var x = document.forms["search"]["key"].value;
            if (x == null || x == "") {
                alert("Key must be filled out");
                return false;
            }
        }
        </script>
        
        <script language="JavaScript" type="text/javascript">
            function checkDelete(){
                return confirm('Are you sure?');
            }
        </script>
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
                <form name="search" onsubmit="return validateForm()" action="indexsearch.php" method="post" class="search">
					<input type="text" maxlength="50" name="key" value="<?php echo $_POST["key"]?>"> 
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
								$sql = "SELECT * FROM question where content LIKE '%".$_POST["key"]."%' or questiontopic LIKE '%".$_POST["key"]."%'";
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {	
										echo '<div class="itemquestion">';
										echo '<div class="columnsmall left"><p>'. $row["vote"].'</p>'.'<p>Votes</p>'.'</div>';
										echo '<div class="columnsmall left"><p>'. $row["answer"].'</p>'.'<p>Answer</p>'.'</div>';
										
										if (strlen($row["content"])>30){
											echo '<div class="columnlarge center">
														<a href="answer.php?id='.$row["question_id"].'"> 
															<h4>'.$row["questiontopic"].'</h4>
														</a>
														<p>'.substr($row["content"],0,30).'...</p>
												  </div>';
										} else{
											echo '<div class="columnlarge center">
													<a href="answer.php?id='.$row["question_id"].'"> 
														<h4>'.$row["questiontopic"].'</h4>
													</a>
													<p>'.substr($row["content"],0,30).'</p>
											  </div>';
										}
										echo '<div class="columnlarge right">'. 
												'<p>asked by 
														<span class="name">'. $row["name"].'</span> |
														<a class="edit" href="question.php?id='.$row["question_id"].'">edit</a> |
														<a class="delete" href="index.php?id='.$row["question_id"].'&rule=delete" onclick="return checkDelete()">delete</a>
												 </p>
											</div>';
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