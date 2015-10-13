<!DOCTYPE html>

<!-- Nama		: Ryan Yonata
	 NIM		: 13513074
	 Nama file 	: Answer.php
	 Keterangan	: Berisi kode php dan html untuk menampilkan pertanyaan
				  yang dipilih beserta daftar jawaban serta form untuk
				  menambahkan jawaban -->

<html>
<head>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="validateinput.js"></script>
	<title>Answers</title>
</head>

<body>
	<div class="pageheader">
		<h1> <a class="pageheader" href="home.php">Simple StackExchange</a></h1>
		<br>
	</div>

	<div class="questiondetail">
		<?php
			include('ConnectDatabase.php');
			$Quest_ID = htmlspecialchars($_GET["id"]);
			$query = "SELECT * FROM Questions WHERE ID = '$Quest_ID'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);

			include('stringProcessing.php');
			echo "<div class='qtopic'> $row[Topic] </div>".
							"			<div class='lineanswer'> <hr> </div>".
							"			<div class='vote'>".
							"				<img src='up.png' class='votebutton' onclick=\"vote($Quest_ID,'Questions','Up')\"><br>";
											$idQuestions = "Questions-".$row['ID'];
							echo "<span id=".$idQuestions." >".$row["Vote"]."</span>".
							"				<br>".
							"				<img src='down.png' class='votebutton' onclick=\"vote($Quest_ID,'Questions','Down')\">".
			 				"			</div>".
			 				"			<div class='question'>".
							"				</br>".
							"				<div class='question-content'> $row[Content] </div>".
			 				"			</div>".
			 				"			<div class='qdetail'>".
		 					"				asked by <a class='Name'>$row[Name]</a> at $row[Date_Created] | <a href='askform.php?id=$row[ID]' id='edit'> edit </a> | <a href='delete.php?id=$row[ID]' onclick=\"return confirm('Are you sure you want to delete this question?')\" id='delete_link'>delete</a>".
		 	 				"			</div> <br>";

		 	$sql_answercount = "SELECT count(*) AS SUM FROM Answers WHERE Question_ID = '$row[ID]' ";
			$answercount = mysqli_query($conn, $sql_answercount);
			$row_answercount = mysqli_fetch_array($answercount);

			$sql_answerlist = "SELECT * FROM Answers WHERE Question_ID = '$row[ID]' ";
			$answerlist = mysqli_query($conn, $sql_answerlist);

			echo "<div class='ans'><h2>$row_answercount[SUM] Answer</h2></div>".
								"					<div class='lineanswer'> <hr> </div>";
			while($row_answerlist = mysqli_fetch_assoc($answerlist)) 
    		{
    			echo "<div class='vote'>".
							"				<img src='up.png' class='votebutton' onclick=\"vote($row_answerlist[ID],'Answers','Up')\"><br>";
											$idAnswers = "Answers-".$row_answerlist['ID'];
							echo "<span id=".$idAnswers." >".$row_answerlist["Vote"]."</span>".
							"				<br>".
							"				<img src='down.png' class='votebutton' onclick=\"vote($row_answerlist[ID],'Answers','Down')\">".
			 				"			</div>".
			 		 "<div class='answerspace'>".
					 "	</br>".
					 "	$row_answerlist[Content]".
			 		 "</div>".
			 		 "<div class='answeredby'>".
		 			 "	answered by <a class='Name'>$row_answerlist[Name]</a> at $row_answerlist[Date_Created]".
		 	 		 "</div>".
		 	 		 "<br> <div class='lineanswer'> <hr> </div>";
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
				<a href="Answer.php?id=<?php echo $_GET["id"] ?> "> <button id="postbutton" type="submit"> Post </button> </a>
			</form>
		</div>
	</div>

	<h2></h2>
</body>
</html>