<!DOCTYPE html>
<html>
<head>
<title>Simple StackExchange</title>
<link rel="stylesheet" type="text/css" href="question.css">
</head>
<body>
	<a class="header" href="index.php">Simple StackExchange</a>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "database_of_questions";
		
		$qid = $_GET["id"];
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$sql = "SELECT * FROM questions WHERE Question_ID=".$qid;
		$result = mysqli_query($conn, $sql);
		$vote = 0;
		$qid = 0;
		$answers = 0;
		
		while($row = mysqli_fetch_assoc($result)){
			echo '<p class="topic">'.$row["Topic"].'</p>';
			echo '<hr class="garistopik">';
			echo '<p class="votetopic" id="Vote">'.$row["Votes"].'</p>';
			$vote = $row["Votes"];
			echo '<p class="upvotetopic" id="Up" onclick="voteUp('.$row["Question_ID"].')">Up</p>';
			echo '<p class="downvotetopic" id="Down" onclick="voteDown('.$row["Question_ID"].')">Down</p>';
			echo '<p  class="topiccontent">'.$row["Content"].'</p>';
			echo '<a onclick="return confirm(\'Are you sure want to delete this question?\')" href="delete.php?id=' . $row["Question_ID"] . '" class="delete">delete</a>';
			echo '<p class="batasi">|</p>';
			echo '<a class="edit" href="edit.php?id='.$row["Question_ID"].'"">edit</a>';
			echo '<p class="batasii">|</p>';
			echo '<p class="askedby">asked by '. $row["Email"].' at '.$row["DateAndTime"].'</p>';
			echo '<hr class="garis">';
			$qid = $row["Question_ID"];
			$sql2 = "SELECT * FROM answers WHERE Question=".$qid;
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_assoc($result2)){
				echo '<p class="voteanswer" id="VoteA'.$row2["Answer_ID"].'" style="top:'.(490+$answers*210).'px">'.$row2["Votes"].'</p>';
				echo '<p class="upvoteanswer" id="UpA" onclick="voteUpA('.$row2["Answer_ID"].')" style="top:'.(473+$answers*210).'px">Up</p>';
				echo '<p class="downvoteanswer" id="DownA" onclick="voteDownA('.$row2["Answer_ID"].')" style="top:'.(525+$answers*210).'px">Down</p>';
				echo '<p class="answeredby" style="top:'.(645+$answers*210).'px">answered by '. $row2["Email"].' at '.$row2["DateAndTime"].'</p>';
				echo '<p  class="answercontent" style="top:'.(475+$answers*210).'px">'.$row2["Content"].'</p>';
				echo '<hr class="garisanswer" style="top:'.(680+$answers*210).'px">';
				$answers++;
			}
			echo '<p class="answers">'.$answers.' Answers</p>';
			echo '<p class="answer" style="top:'.(470+$answers*210).'px">Your Answer</p>';
			echo '<form action="answer.php" method="get" onsubmit="return validateAnswerForm()" id="Question">';
			echo '<input type="text" name="Name" id="Name" onfocus="focusName()" onblur="blurName()" value = "Name" style="color: #808080; top:'.(535+$answers*210).'px">';
			echo '<input type="text" name="Email" id="Email" onfocus="focusEmail()" onblur="blurEmail()" value = "Email" style="color: #808080; top:'.(568+$answers*210).'px">';
			echo '<input type="submit" value="Post" style="top:'.(810+$answers*210).'px">';
			echo '<input type="text" name="Question" id="Question" value="'.$qid.'" hidden>';
			echo '</form>';
			echo '<textarea form ="Question" name="Content" id="Content" onfocus="focusContent()" onblur="blurContent()" rows="12" wrap="soft" style="color: #808080; top:'.(601+$answers*210).'px">Content</textarea>';
		}
	?>
	<script src="questionform.js" type="text/javascript">
	</script>
</body>
</html>
