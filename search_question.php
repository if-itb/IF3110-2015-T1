<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="questionStyle.css"/>
		<title>Home</title>
	</head>

<body>
<div class="container">
<div id="header"><a class="link1" href="home.php">Simple StackExchange</div></a>
<div>
<form>
	<input class="kotaksearch" type="text" name="search">
	<input class="search" type="submit" value="Search">
</form>
</div>

<div class="ask"> Cannot find what you are looking for ? <a class="link" href="search.php"> Ask Here </a>  </div>

<div>
	<!--<div class="header2" id="main3"> Recently Asked Questions </div>*/-->
	<div> 
	
		<?php
			function Home($url, $permanent = false)
			{
				header('Location: ' . $url, true, $permanent ? 301:302); 
				exit(); 
			}

			include('dataBase.php'); 
			$Search = ($_POST["search"]); 
			$sql = "SELECT * FROM questions WHERE Topic LIKE '%".$Search."%' OR Content LIKE '%".$Search."%' ";
			$result = mysqli_query($conn,$sql); 

			echo "<div class=header2 id=main3>" .mysqli_num_rows($result). " Results </div>"; 

			if (mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))

				{

					echo "<div class= vote> <span class= vote-counts>".$row["Vote"]."</span> <div class=vote-title>Vote</div>
					</div> ";
					echo "<div class=answer> <div class=answer-counts>0</div> <div class=answer-title>Answer</div>
					</div>"; 

					echo "<div class=vote> <class=vote-counts> <a  href=answer.php?id=".$row["ID"]. "  class=link3 >".$row["Topic"]. "</a>  </div> <br> <div class=contents>".$row["Content"]."</div>";
					//echo "<div> <span class=contents>".$row["Content"]." </span></div>";
					//echo "<div class=content><span>".$row["Content"]. "</span> </div> ";
					echo "<div class=asked> asked by " .$row["Name"]."| <a href=edit.php?id=".$row["ID"]. " class=link > edit </a> | <a onclick=\"return confirm('Are you sure want to delete this question?')\" href=DeleteQuestion.php?id=".$row["ID"]. " class=link2> delete <a> </div>";
					echo "<div class=garis> </div>"; 
					//echo "<br> </br>"; 
				}
			}
			else 
			{
				echo "    no recently asked questions";
			}

	

			//($result); 

			mysqli_close($conn);

		?>
	</div>

</body>
</html>