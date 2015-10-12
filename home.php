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
<form>
	<input class="kotaksearch" type="text" name="search">
	<input class="search" type="submit" value="Search">
</form>
</div>

<div class="ask"> Cannot find what you are looking for ? <a class="link" href="search.php"> Ask Here </a>  </div>

<div>
	<div class="header2" id="main3"> Recently Asked Questions </div>
	<div> 
		
		<?php
			include("dataBase.php"); 
			$sql = "SELECT ID, Vote, Name, Email, Topic, Content FROM questions"; 
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))

				{

					echo "<div class= vote> <span class= vote-counts>".$row["Vote"]."</span> <div class=vote-title>Vote</div>
					</div> ";
					echo "<div class=answer> <div class=answer-counts>0</div> <span class=answer-title>Answer</span>
					</div>"; 

					echo "<div class=topic>".$row["Topic"]."" .$row["Content"]. "<br> </br> </div> ";
					echo "<div class=asked> asked by " .$row["Name"]."| <a href=edit.php?id=".$row["ID"]. " class=link > edit </a> | <a onclick=\"return confirm('Are you sure want to delete this question?')\" href=DeleteQuestion.php?id=".$row["ID"]. " class=link2> delete <a> </div>";
					echo "<div class=garis> </div>"; 
					//echo "<br> </br>"; 
				}
				mysqli_close($conn);
			}
			else 
			{
				echo "    no recently asked questions";
			}
		?>
	</div>
	<!--<div>
		<div>
			<div class="vote">
				 <span class="vote-counts">0</span>
				 <div class="vote-title">Vote</div>
			</div>

			<div class="answer">
				 <div class="answer-counts">0</div>
				 <span class="answer-title">Answer</span>
			</div>
			<div class="topic"> 
				<a href="#"> The question topic goes here </a> 
			</div>
			<p class="asked"> asked by name | <a href="#"> edit </a> | <a href="#"> delete </a>  </p>
			
		</div>
		<div>
			
		</div>-->


		<!--<div>
			<p class="asked"> asked by name | <a href="#"> edit </a> | <a href="#"> delete </a>  </p>
		</div>

	</div>

	<div>
		<div>
			<div>
				 0 
			</div>
			<div>
				 Vote 
			</div> 
		</div>

		<div>
			<div>
				 0 
			</div>
			<div>
				 Answer 
			</div> 
		</div>
		<div>
			<p> <a href="#"> The question topic goes here </a> </p>
		</div>
		<div>
			<p> asked by name | <a href="#"> edit </a> | <a href="#"> delete </a>  </p>
		</div>

	</div>
</div>
</div>-->
<!-- <p>This is a paragraph.</p> -->

</body>
</html>