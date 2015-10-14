<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="questionStyle.css"/>
		<title>Answer</title>
	</head>

<body>
	<div class="container">
	<div  id="header" > <a class="link1" href="home.php"> Simple StackExchange </div> </a>
	<?php 
		include("dataBase.php"); 

		$ID = htmlspecialchars($_GET['id']); 
		$input = "SELECT ID, Vote, Name, Email, Topic, Content, Date_Create FROM questions WHERE ID = $ID"; 
		$question = mysqli_query($conn, $input);
		$output = "SELECT ID, Vote, Name, Email, Content, Date_Create FROM answers WHERE Quest_ID = $ID";
		$answer = mysqli_query($conn, $output);

		include("EditAnswer.php");

		/* 
					echo "<div class= vote> <span class= vote-counts>".$row["Vote"]."</span> <div class=vote-title>Vote</div>
					</div> ";
					echo "<div class=answer> <div class=answer-counts>0</div> <div class=answer-title>Answer</div>
					</div>"; 

					echo "<div class=vote> <class=vote-counts> <a  href=answer.php?id=".$row["ID"]. "  class=link3 >".$row["Topic"]. "</a>  </div> <br> <div class=contents>".$row["Content"]."</div>";
					//echo "<div> <span class=contents>".$row["Content"]." </span></div>";
					//echo "<div class=content><span>".$row["Content"]. "</span> </div> ";
					echo "<div class=asked> asked by " .$row["Name"]."| <a href=edit.php?id=".$row["ID"]. " class=link > edit </a> | <a onclick=\"return confirm('Are you sure want to delete this question?')\" href=DeleteQuestion.php?id=".$row["ID"]. " class=link2> delete <a> </div>";
					echo "<div class=garis> </div>"; */

		echo "<script type = \"text/javascript\" src = \"vote.js\"> </script>";
		if(mysqli_num_rows($question) > 0 ) { 
			while ($row = mysqli_fetch_assoc($question)){
				
				echo "<div> <div class=header2 id=main3> ".$row["Topic"]."</div> ";
				echo "<div class = arrow-up id = QU".$row["ID"]." name=vote onclick = vote(this.id)> </div> ";
				echo "<div  class = votes > <div id=Q".$row["ID"]." class=votes-counts>".$row["Vote"]."</div> "; 
				echo" <div class=content1> <div class=content2>" .$row["Content"]."</div> </div>  	 ";
				echo "<div class = arrow-down id = QD".$row["ID"]." name=vote onclick = vote(this.id)> </div> "; 
				echo "<div class=asked1> asked by " .$row["Name"]." at " .$row["Date_Create"]." | <a href=edit.php?id=".$row["ID"]. " class=link > edit </a> | <a onclick=\"return confirm('Are you sure want to delete this question?')\" href=DeleteQuestion.php?id=".$row["ID"]. " class=link2> delete <a> </div>";
				

			}
		echo "<div class=header2 id=main3>".mysqli_num_rows($answer)." Answer </div>"; 

		}

		if(mysqli_num_rows($answer) > 0 ) { 
			while ($row = mysqli_fetch_assoc($answer)){
				echo "<div id =AU".$row["ID"]." name=vote onclick = vote(this.id) class = arrow-up> </div> ";
				echo "<div class = votes > <div id= A".$row["ID"]." class=votes-counts >".$row["Vote"]."</div>";
				echo "<div class=content1> <div class=content2>" .$row["Content"]."</div> </div>";
				echo "<div id = AD".$row["ID"]." name=vote onclick = vote(this.id) class = arrow-down> </div> ";
				echo "<div class=asked2> answer by " .$row["Email"]." at " .$row["Date_Create"]. "</div>";
				echo "<div class=garis> </div>"; 
				//echo "<div class=header2 id=main3>".mysqli_num_rows($answer)."Answer </div>"; 

			}

		echo "<br>"; 
			
	
		 

		}
		echo " <div class=header2 id=main3> Your Answer </div>
		<form name=ask onsubmit= \"return ValidasiInput()\" action=answer.php?id=" .$ID." method=post>
	
		
			<input type=text name=name placeholder=Name class=header3 > 
		
			<input type=text name=email placeholder=Email class=header3  > 
						
			<textarea type=text name=content placeholder=Content class=header3 id=content value=></textarea> 
		
			<br> </br> 
			<button class = answer1 type=submit name=answer value=Post> Post </button>
			
			
	
			</form>"; 
		

		mysqli_close($conn);


	?> 




</div>
</body>
</html>