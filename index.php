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
                    if (isset($_GET["rule"]) && $_GET["rule"]=="update"){
                        
                        mysqli_query($con,"UPDATE question SET name='$_POST[name]',email='$_POST[email]',questiontopic='$_POST[topic]',content='$_POST[topic]' WHERE question_id='$_GET[id]'");
                    }
                    else{
                        
                        mysqli_query($con,"INSERT INTO question (name,email,questiontopic,content,vote,date,answer) 
                        VALUES ('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[content]',0,NOW(),0)");
                    }
					mysqli_close($con);
				}
			}
            else{
                
                if (isset($_GET["rule"]) && $_GET["rule"]=="delete"){
                    $con = mysqli_connect("localhost","root","","wbd");
                    mysqli_query($con,"DELETE FROM question WHERE question_id='$_GET[id]'");
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
				<form name="search" onsubmit="return validateForm()" action="indexsearch.php" method="post" class="search">
					<input type="text" maxlength="50" name="key">
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