<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="validateinput.js"></script>
	<title>Answers</title>
</head>

<body>
	<div class="pageheader">
		<h1>Simple StackExchange</h1>
		<br>
	</div>

	<div class="questiondetail">
		<?php
			include('ConnectDatabase.php');
			$Quest_ID = htmlspecialchars($_GET["id"]);
			$query = "SELECT * FROM Questions WHERE ID = '$Quest_ID'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);

			echo "<div class='qtopic'> $row[Topic] </div>".
							"			<div class='lineanswer'> <hr> </div>".
							"			<div class='vote'>".
							"				Up <br>".
											$row["Vote"].
							"				<br>".
							"				Down".
			 				"			</div>".
			 				"			<div class='question'>".
							"				</br>".
							"				<span class='question-content'> $row[Content] </span>".
			 				"			</div>".
			 				"			<div class='qdetail'>".
		 					"				asked by $row[Name] at $row[Date_Created] | <a href='askform.php?id=$row[ID]' id='edit'> edit </a> | <a href='delete.php?id=$row[ID]' onclick=\"return confirm('Are you sure you want to delete this item?')\" id='delete_link'>delete</a>".
		 	 				"			</div> <br> <br> <br> <br>";

		 	$sql_answercount = "SELECT count(*) AS SUM FROM Answers WHERE Question_ID = '$row[ID]' ";
			$answercount = mysqli_query($conn, $sql_answercount);
			$row_answercount = mysqli_fetch_array($answercount);

			$sql_answerlist = "SELECT * FROM Answers WHERE Question_ID = '$row[ID]' ";
			$answerlist = mysqli_query($conn, $sql_answerlist);

			echo "<h2>$row_answercount[SUM] Answer</h2>".
								"					<div class='lineanswer'> <hr> </div>";
			while($row_answerlist = mysqli_fetch_assoc($answerlist)) 
    		{
    			echo "<div class='vote'>".
    				 "	Up <br>".
						$row_answerlist["Vote"].
					 "	<br>".
					 "	Down".
			 		 "</div>".
			 		 "<div class='answerspace'>".
					 "	</br>".
					 "	<span class='answer-content'> $row_answerlist[Content] </span>".
			 		 "</div>".
			 		 "<div class='answeredby'>".
		 			 "	answered by $row_answerlist[Name] at $row_answerlist[Date_Created]".
		 	 		 "</div>".
		 	 		 "<br> <br> <br> <div class='lineanswer'> <hr> </div>";
    		}
			mysqli_close($conn);
		?>
	</div>

	<div id="form">
		<div class="content">
			<div class="youranswer">
				Your Answer
			</div>
			<br>
			<form name="answerform" class="answerform" onsubmit="return validateAnswerinput()" action="submitAnswer.php?id=<?php echo htmlspecialchars($_GET["id"]) ?>" method="post">
				<input type="text" id="name" name="name" placeholder="Name">
				<br>
				<input type="text" id="email" name="email" placeholder="Email">
				<br>
				<textarea id="content" name="content" placeholder="Content" rows="5" cols="40"></textarea>
				<br>
				<button id="postbutton" type="submit">Post</button>
			</form>
		</div>
	</div>

	<h2></h2>
</body>
</html>