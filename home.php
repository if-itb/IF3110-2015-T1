<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="questionStyle.css"/>
		<title>Home</title>
	</head>

<body>
<div class="container">
<div id="header">Simple StackExchange</div>
<div>
<form action = "search_question.php" method = "post">
	<input class="kotaksearch" type="text" name="search">
	<input class="search" type="submit" value="Search">
</form>
</div>



<div class="ask"> Cannot find what you are looking for ? <a class="link" href="search.php"> Ask Here </a>  </div>

<div>
	<div class="header2" id="main3"> Recently Asked Questions </div>
	<div> 
		
		<?php
			function cutString($string)
			{
				if (strlen($string) > 160) {
					return substr(strip_tags($string),0 , 160) . '...'; 
				}else { 
					return $string; 
				}
			}
			include("dataBase.php"); 
			$sql = "SELECT ID, Vote, Name, Email, Topic, Content FROM questions"; 
			
			$result = mysqli_query($conn, $sql);
			$sql2 = "SELECT ID, Vote, Name Email, Content FROM answers"; 
			$result2 = mysqli_query($conn, $sql2); 
			
			if (mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))

				{

					echo "<div class= vote> <span class= vote-counts>".$row["Vote"]."</span> <div class=vote-title>Vote</div>
					</div> ";
					$sql2 = "SELECT count(*) AS SUM FROM answers WHERE Quest_ID = '$row[ID]'"; 
					$result2 = mysqli_query($conn, $sql2); 
					$row2 = mysqli_fetch_array($result2);
					$cutContent = cutString($row["Content"]); 

					echo "<div class=answer> <div class=answer-counts>".$row2["SUM"]."</div> <div class=answer-title>Answer</div>
					</div>"; 

					echo "<div class=vote> <class=vote-counts> <a  href=answer.php?id=".$row["ID"]. "  class=link3 >".$row["Topic"]. "</a>  </div> <br> <div class=contents>".$cutContent."</div>";
					
					echo "<div class=asked  > asked by <a class='colorname'>$row[Name]</a> |  <a href=edit.php?id=".$row["ID"]. " class=link > edit </a> | <a onclick=\"return confirm('Are you sure want to delete this question?')\" href=DeleteQuestion.php?id=".$row["ID"]. " class=link2> delete <a> </div>";
					echo "<div class=garis> </div>"; 
					
				}
				mysqli_close($conn);
			}
			else 
			{
				echo "    no recently asked questions";
			}
		?>
	</div>

</body>
</html>