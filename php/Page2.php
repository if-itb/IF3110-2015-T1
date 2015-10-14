<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="wbd.css">
		<script type="text/javascript" src="wbd.js"></script>
		<title>
			Page 2 - TuCil WBD
		</title>
	</head>

	<body>
	
		<div class="font30">
			<h1>
				<a class="no-text-decoration" href="page1.php">
					Simple StackExchange
				</a>
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
			<form name="questionForm" action="insertQuestion.php" method="post" onsubmit="return validateQue()">
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
			define('dbName','SimpleStackExchange');
			define('dbUser','root');
			define('dbPass','');
			define('dbHost','localhost');

			// create connection
			$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
			
			// load database
			$query="SELECT * FROM question WHERE QuestionID=" . $_GET["id"];
			$result=mysqli_query($dbConn,$query);
			
			while ($fetched = $result->fetch_assoc())
			{	
				if ($fetched["QuestionID"]==$_GET["id"])
				{			
					echo'
					<form name="questionForm" action="updateQuestion.php?id=' . $_GET['id'] . '" method="post" onsubmit="return validateQue()">
						 <div class="text-left">
								 <input class="form-textbox" type="text" name="name" value="' . $fetched["Name"] . '"><br><br>
								 <input class="form-textbox" type="text" name="email" value="' . $fetched["Email"] . '"><br><br>
								 <input class="form-textbox" type="text" name="topic" value="' . $fetched["Topic"] . '"><br><br>
								 <textarea name="question">' . $fetched["Question"] . '</textarea><br><br>
						 </div>
					
						 <div class="text-right">
							 <input class="form-submit" type="submit" name="post" value="Post">
						 </div>
					 </form>';
				}
			}
		}
?>

	</body>
</html>