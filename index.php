<!DOCTYPE html>
<html>
	<head>
		<title> Index </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<div class="container">
			<h1 class="title">Simple StackExchange</h1>
			<form action="Search.php">
				<input class="searchBox" type="text" name="questions">
				<input type="submit" class="submitButton" value="Search">
			</form>
			<p>
				Cannot find what you are looking for? <a href="ask.php">Ask here</a>
				<br>
				<br>
			</p>
			
			<div class="raqtitle left"><h3>Recently Asked Question</h3></div>
				<?php
					$dbHost = 'localhost:3306';
					$dbUser = 'root';
					$dbPass = '';
					$dbName = 'question_answers';
					
					$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
					
					if(!$conn){
						die('Could not connect: ' . mysql_error());
					}
					
					$sql = "SELECT * FROM `questions`";
					
					$result = mysqli_query($conn, $sql);
					while($row = $result->fetch_assoc()) : ?>
						<div class="raq">
							<?php
								$sql2 = "SELECT COUNT(ID) as count FROM `answers` WHERE QuestionID = " . $row['ID'];					
								$result = mysqli_query($conn, $sql2);
								$answer = mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];
							?>						
							<div class="votepart">
								<div class="votenumber"><?php echo $row['Vote']?></div>
								<div class="votetext">Votes</div>
							</div>
							<div class="answerpart">
								<div class="answernumber"><?php echo $answer?></div>
								<div class="answertext">Answers</div>
							</div>
							<div class="questionpart">
								<div class="qtopic">
									<a href="detail.php?id=<?php echo $row['ID'] ?> &type=question_answer"><?php echo $row['Topic'] ?></a>
								</div>
								<div class="qcontent">
									<?php 
										echo $row['Content'];
									?>
								</div>
							</div>
							<div class="labelunder">
								<p class="ab">asked by </p>
									<a href="#" class="name"><?php echo $row['Name']; ?></a>
									<form method="post" action="ask.php" class="hiddenform">
										<input name="id" type="hidden" value=<?php echo $row["ID"]; ?>>
										<button value=<?php echo $row["ID"]; ?>>Edit</button>
									</form>
									<form method="post" action="delete.php">
										<button name="id" type="submit" value=<?php echo $row["ID"]; ?> onclick="confirmDelete()">Delete</button>
									</form>
							</div>
						</div>
					<?php endwhile; ?>
				<script>
					function confirmDelete() {
					  var x = confirm("Are you sure you want to delete?");
					  if (x)
						  return true;
					  else
						return false;
					}
				</script>
		</div>
	</body>
</html>
