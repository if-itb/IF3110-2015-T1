<!DOCTYPE html>
<html>
<head>
	<title>Answer - Simple StackExchange</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
	<div class="header-page">
		<h1><a href="index.php">Simple StackExchange</a></h1>
	</div>

	<div class="question-preview">
		<?php 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "stack_exchange";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn)
			{
		    	die("Connection failed: " . mysqli_connect_error());
			}

			$QID = htmlspecialchars($_GET["id"]);
			$sql = "SELECT * FROM question WHERE ID = '$QID'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			// Question Preview
			echo "<h3>$row[Topic]</h3>";
				echo "<hr>";
				$idQuestion = "Q_".$row['ID'];
				echo "<div class='vote'>".
						"<img src='img/up.png' onclick=\"getVote($row[ID],'Q','Up')\"></img>".
						"<div id='".$idQuestion."'>".$row['Vote']."</div>".
						"<img src='img/down.png' onclick=\"getVote($row[ID],'Q','Down')\"></img>".
					 "</div>";
				echo "<div class='question-prev'>".
						"<div id='question-content'>$row[Content]</div>".
					 "</div>";
				echo '<div class="question-info">'.
				 		"asked by <span id='qname'>$row[Name]</span> at <span id='qdate'>$row[Date]</span> | ".
				 		"<a href='question.php?id=$row[ID]' id='edit'> edit </a> | ".
				 		"<a href='delete.php?id=$row[ID]' onclick=\"return confirm('Are you sure you want to delete this question?')\" id='delete'>delete</a>".
				 	 "</div>";
			echo "</div>";

			// Answer Preview
			$sql_answercount = "SELECT count(*) AS SUM FROM answer WHERE Que_ID = '$row[ID]' ";
			$answer = mysqli_query($conn, $sql_answercount);
			$row_answer = mysqli_fetch_array($answer);

			echo "<div class='ans'><h3>$row_answer[SUM] Answer</h3></div>".
					"<hr>";

			$sql_answerlist = "SELECT * FROM answer WHERE Que_ID = '$row[ID]' ";
			$answerlist = mysqli_query($conn, $sql_answerlist);

			while ($row_answerlist = mysqli_fetch_assoc($answerlist)) {
				$idAnswer = "A_".$row_answerlist['Ans_ID'];
				echo "<div class='vote'>".
						"<img src='img/up.png' onclick=\"getVote($row_answerlist[Ans_ID],'A','Up')\"></img>".
						"<div id='".$idAnswer."'>".$row_answerlist['Vote']."</div>".
						"<img src='img/down.png' onclick=\"getVote($row_answerlist[Ans_ID],'A','Down')\"></img>".
					 "</div>";
				echo "<div class='answer-prev'>".
						"<div id='answer-content'>$row_answerlist[Answer]</div>".
					 "</div>";
				echo '<div class="answer-info">'.
				 		"answered by <span id='aname'>$row_answerlist[Name]</span> at <span id='adate'>$row_answerlist[Date]</span>".
				 	 "</div>";
				echo "<div id='aline'><hr></div>";
			}
		?>
	</div>

	<h3 id="your-answer">Your Answer</h3>
	<div class="answer-form">
		<form id="fanswer" name="fanswer" onsubmit="return validateAnswerInput()" action="add_answer.php?id=<?php echo htmlspecialchars($_GET["id"]) ?>" method="post">
			<div><input type="text" id="name" name="name" placeholder="Name"></div>
			<div><input type="text" id="email" name="email" placeholder="Email"></div>
			<div><textarea id="content" name="content" placeholder="Content" rows="5" cols="40"></textarea></div>
			<div><input id="postbutton" type="submit" value="Post"></div>
		</form>
	</div>
</body>
</html>