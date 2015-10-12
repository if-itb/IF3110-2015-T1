<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<title>
			Page 2 - TuCil WBD
		</title>
	</head>

	<body>
	
		<div class="font30 color-blue">
			<h1>
				Simple StackExchange
			</h1>
		</div>	
		
			<br>
			
		<div class="judulform text-left">
				What's your question ?
		</div>

		<br>
		
<?php
		if (!isset($_GET["id"]))
		{
			echo'
			<form action="insertQuestion.php" method="post">
				 <div class="text-left">
						 <input class="form-textbox" type="text" name="name" placeholder="Name"><br><br>
						 <input class="form-textbox" type="text" name="email" placeholder="Email"><br><br>
						 <input class="form-textbox" type="text" name="topic" placeholder="Question Topic"><br><br>
						 <textarea name="question" placeholder="Content"></textarea><br><br>
				 </div>
			
				 <div class="text-right">
					 <input class="form-submit" type="submit" name="post" value="Post">
				 </div>
			 </form>';
		}
		else
		{
			echo'
			<form action="updateQuestion.php?id=' . $_GET['id'] . '" method="post">
				 <div class="text-left">
						 <input class="form-textbox" type="text" name="name" placeholder="Name"><br><br>
						 <input class="form-textbox" type="text" name="email" placeholder="Email"><br><br>
						 <input class="form-textbox" type="text" name="topic" placeholder="Question Topic"><br><br>
						 <textarea name="question" placeholder="Content"></textarea><br><br>
				 </div>
			
				 <div class="text-right">
					 <input class="form-submit" type="submit" name="post" value="Post">
				 </div>
			 </form>';
		}
?>

	</body>
</html>