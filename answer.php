<!DOCTYPE html>
<html>
	<head>
        
       <script src="votequestion.js"></script> 
        
        
        <script>
        function validateForm() {
           var x = document.forms["answer"]["name"].value;
            if (x == null || x == "") {
                alert("Name must be filled out");
                return false;
            }
            var x = document.forms["answer"]["email"].value;
            if (x == null || x == "") {
                alert("Email must be filled out");
                return false;
            }
            else{
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                 if(!re.test(x)){
                    alert("Email Invalid");
                     return false;
                }
            }
            var x = document.forms["answer"]["content"].value;
            if (x == null || x == "") {
                alert("Content must be filled out");
                return false;
            }
        }
        </script>
        
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
                    $sql =  "SELECT * FROM question WHERE question_id=".$_GET["id"];
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {	
                                        
                                        $ans=$row["answer"]+1;
										 mysqli_query($con,"UPDATE question SET answer='$ans' WHERE question_id='$_GET[id]'");
									}
								}
                    
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
                                    echo "<h2>".$row["questiontopic"]."</h2>";
                                    echo '<div class="columnsmall left" >
                                        <img src="up.png" alt="up" height="42" width="42" onclick="voteup('.$_GET["id"].')">
                                            <p id="ajax">'. $row["vote"].'</p>'.
                                        '<img src="down.png" alt="down" height="42" width="42" onclick="votedown('.$_GET["id"].')"></div>';
                                    echo '<div class="columnlargest center">';
                                       
                                        echo "<p class='wrap'>".$row["content"]."</p>";
                                        $answer=$row["answer"];
                                    echo "</div>";
								echo "</div>";
                                echo '<div class="footer">';
                                   echo '<p>asked by 
												'. $row["name"].' at '.$row["date"].' |
												<a class="edit" href="question.php?id='.$row["question_id"].'">edit</a> |
												<a class="delete" href="index.php?id='.$row["question_id"].'&rule=delete" onclick="return checkDelete()">delete</a>
								        </p>';
								echo "</div>";
							}
						}
						
						echo "<div>";
						echo "<h2>".$answer." Answer</h2>";
						$anssql = "SELECT * FROM answer WHERE question_id=".$_GET["id"];
						$ansresult = $con->query($anssql);

						if ($ansresult->num_rows > 0) {	
							while($row = $ansresult->fetch_assoc()) {
								echo "<div class='answer'>";
								    echo '<div class="columnsmall left" >
                                            <img src="up.png" alt="up" height="42" width="42" onclick="voteupans('.$row["answer_id"].')">
                                            <p id="ajax'.$row["answer_id"].'">'. $row["vote"].'</p>'.
                                            '<img src="down.png" alt="down" height="42" width="42" onclick="votedownans('.$row["answer_id"].')">
                                        </div>';
                                    echo '<div class="columnlargest center">';
                                       
                                        echo "<p class='warp'>".$row["content"]."</p>";
                                    echo "</div>";
								echo '<div class="footer">';
                                        echo '<p>answered by 
												'. $row["name"].' at '.$row["date"];'
								        </p>';
								echo "</div>";
								echo "</div>";
                               
							}
						}
						echo "</div>";
						
						mysqli_close($con);
					}
				
				?>
				<div>
					<h3>Your Answer</h3>
					<?php echo '<form name="answer" action="answer.php?id='.$_GET["id"]. '" method="post" onsubmit="return validateForm()" class="form">' ?>
						<input type="text" maxlength="12" name="name" placeholder="Name"><br>
						<input type="text" name="email" maxlength="30" placeholder="Email"><br>
						<textarea name="content" placeholder="Content" maxlength="1500"></textarea>
						<input type="submit" value="Post">
					</form>
				</div>
			</div>
		</div>
	
	</body>
</html>