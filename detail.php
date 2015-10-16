<!DOCTYPE html>
<html>
	<head>
		<title> Detail </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script>
			function validateInput() {
				var name, email, content, text;
				var error = false;
				var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

				text = "";
				
				name = document.forms["ans"]["name"].value;
				email = document.forms["ans"]["email"].value;
				content = document.forms["ans"]["content"].value;
				
				//name
				if(name == null || name == ""){
					text = text + "Name must be filled" + "\n";
					error = true;
				}
				
				
				//email
				if(email == null || email == ""){
					text = text + "Email must be filled" + "\n";
					error = true;
				} else if (!re.test(email)) {
					text = text + "Please enter a valid email address" + "\n";
					error = true;
				}
				
				
				//Content
				if(content == null || content == ""){
					text = text + "Content must be filled" + "\n";
					error = true;
				}
				
				
				if(error){
					window.alert(text);
					return false;
				}
			}
		</script>
	</head>
	
	<body>
		<div class="container">
			<h1 class="title">Simple StackExchange</h1>
			<script type="text/javascript">
				function vote(id,type,result)
				{
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() 
					{
						if (xhttp.readyState == 4 && xhttp.status == 200) 
						{
							if(type == 'questions')
							   document.getElementById("qvote").innerHTML = xhttp.responseText;
							else
							   document.getElementById("avote"+id).innerHTML = xhttp.responseText;
						}
					}
					xhttp.open("POST", "vote.php", true);
					xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
					xhttp.send("result=" +result+ "&id=" + id + "&type=" + type);
				}
			</script>
			
			<?php 
				$id = $_GET["id"];
				
				$dbHost = 'localhost:3306';
				$dbUser = 'root';
				$dbPass = '';
				$dbName = 'question_answers';
				
				$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
				
				if(!$conn){
					die('Could not connect: ' . mysql_error());
				}
				
				$topicSQL = "SELECT * FROM `questions` WHERE ID = " . $id;
				$topicResult = mysqli_query($conn, $topicSQL);
				if($question = $topicResult->fetch_assoc()){
					echo '<div class="qtopic black"> ' . $question["Topic"] . '</div>' . "<br>";
					$id = $question["ID"];
					echo '<div class="question">';
					echo '<div class="votepart">';
					echo "<a href=javascript:vote(" . $question["ID"] . ",'questions','up')><img id='up' src='vote_up.png' width='32px' height='32px'></a><br>";
					echo $question["Vote"] . "<br>";
					echo "<a href=javascript:vote(" . $question["ID"] . ",'questions','down')><img id='up' src='vote_down.png' width='32' height='32'></a><br>" . "</div>";
					echo '<div class="questionpart">' . $question["Content"] . "</div><br>";
					echo '<div class="labelunder">';
					echo '<p class="ab">asked by </p>';
					echo '<a href="#" class="askedname">' . $question["Name"] . '</a>';
                    echo '<p class="ab">at</p>';
                    echo '<p class="date">' . $question["Date"] . '</p>';
                    echo '<div>' . $question["Name"] . "</div><br>";
					echo $question ["Date"] . "<br></div>";
				}
				
				$sql = "SELECT * FROM `answers` WHERE QuestionID = " . $id;
				
				$result = mysqli_query($conn, $sql);
				$totalAnswers = mysqli_num_rows($result);
			?>
			
			<h3><?php echo $totalAnswers ?> Answers</h3>
			<div class="left">
			<?php
				while ($row = $result->fetch_assoc()) {
					$vote = $row["Vote"];
					$name = $row["Name"];
					$date = $row["Date"];
					$content = $row["Content"];
					
					echo "<a href=javascript:vote(" . $row["ID"] . ",'answers','up')><img id='up' src='vote_up.png' width='32' height='32'></a><br>";
					echo '<div class="vote">' . $row["Vote"] . '</div>' . "<br>";
					echo "<a href=javascript:vote(" . $row["ID"] . ",'answers','down')><img id='up' src='vote_down.png' width='32' height='32'></a><br>";
					echo '<div class="name">' . $name . '</div><br>';
					echo '<div class="qcontent medium">' . $content . '</div><br><br>';
				} 
				mysqli_close($conn);
				
			?>
			</div>
			
			
			
			<form class="ansform" action = "createAnswer.php" method="post" onsubmit="return validateInput()">
				<input name="name" class="textBox" type="text" placeholder="Name">
				<br><br>
				<input name="email" class="textBox" type="text" placeholder="Email">
				<br><br>
				<textarea name="content" placeholder="Content"></textarea>
				<br><br>
				<input name="id" type="hidden" value="<?php echo $id; ?>">
				<div class="right">
					<input class="postButton" type="Submit" value="Post">
				</div>
			</form>
		</div>
	</body>
</html>


