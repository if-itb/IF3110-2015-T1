<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="wbd.css">
		<script type="text/javascript" src="wbd.js"></script>
		<title>
			Page 3 - TuCil WBD
		</title>
	</head>

	<body>
		<div class="font30 color-blue">
			<h1>
				<a class="no-text-decoration" href="page1.php">
					Simple StackExchange
				</a>
			</h1>
		</div>
		<br>
		
		<?php	

			define('dbName','SimpleStackExchange');
			define('dbUser','root');
			define('dbPass','');
			define('dbHost','localhost');

			// create connection
			$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
			
			// execute querry
			$query = "SELECT * FROM question";
			$result = mysqli_query($dbConn,$query);
			
			while ($fetched = $result->fetch_assoc())
			{	
				if ($fetched["QuestionID"]==$_GET["id"])
				{
					echo'
					<h1 class="text-left font30">
						' . $fetched["Topic"] . '
					</h1>
					<hr>
					<div>
						<table class="table1">
							<tr>
								<td class="tdnumber2 text-center">
									<img class="image1" src="arrowup.jpg" alt="VoteUp" onclick="upVoteQue('.$_GET['id'].')"><br>
									<br><span id="ajaxQuestion'.$_GET['id'].'">' . $fetched["Vote"] . '</span></br><br>
									<img class="image1" src="arrowdown.jpg" alt="VoteDown" onclick="downVoteQue('.$_GET['id'].')">
								</td>
								<td class="tdtopic text-left">
									' . $fetched["Question"] . '
								</td>
							</tr>
							<tr>
								<td colspan="2" class="text-right">
										 <p>
											 Asked by 
											 <span class="color-blue">' . $fetched["Name"] . '</span>
											  at 
											 <span>' . $fetched["DateandTime"] . '</span>
											  | 
											 <a class="color-yellow" href="Page2.php?id=' . $fetched["QuestionID"] . '"> edit </a>
											  | 
											 <a class="color-red" href="deleteQuestion.php?id=' . $fetched["QuestionID"] . '"> delete </a>
										 </p>								
								</td>
							</tr>
						</table>
						<br><br>
						<h1 class="text-left font30">
							' . $fetched["Answer"] . ' Answer
						</h1>
						<hr>
					</div>
					';
				}
				else
				{

				}
			}
			echo $fetched["Answer"];
			$query2 = "SELECT * FROM answers WHERE answers.QuestionID = '$_GET[id]'";
			$result2 = mysqli_query ($dbConn,$query2);

			if ($result2->num_rows > 0)
			{
				while ($fetched2=$result2->fetch_assoc())
				{
					echo'
					<div>
						<table class="table1">
							<tr>
								<td class="tdnumber2 text-center">
									<img class="image1" src="arrowup.jpg" alt="VoteUp" onclick="upVoteAns(' . $fetched2["AnswerID"] . ')"><br>
									<br><span id="ajaxAnswer'.$fetched2["AnswerID"].'">' . $fetched2["Vote"] . '</span></br> <br>
									<img class="image1" src="arrowdown.jpg" alt="VoteDown" onclick="downVoteAns(' . $fetched2["AnswerID"] . ')">
								</td>
								<td class="tdtopic text-left">
									' . $fetched2["Answer"] . '
								</td>
							</tr>
							<tr>
								<td colspan="2" class="text-right">
										 <p>
											 Answered by 
											 <span class="color-blue">' . $fetched2["Name"] . '</span>
											  at 
											 <span>' . $fetched2["DateandTime"] . '</span>
										 </p>								
								</td>
							</tr>
						</table>
						<br><br>
					</div>
					';						
				}
			}
			else
			{
				
			}
			
			echo'
			<br><br>
				<h1 class="text-left font30">
					Write your answer here
				</h1>
			<hr>
			
			<form name="answerForm" action="insertAnswers.php?id=' . $_GET['id'] . '" method="post" onsubmit="return validateAns()">
				 <div class="text-left">
						 <input class="form-textbox" type="text" name="name" placeholder="Name"><br><br>
						 <input class="form-textbox" type="text" name="email" placeholder="Email"><br><br>
						 <textarea name="answer" placeholder="Content"></textarea><br><br>
				 </div>
			
				 <div class="text-right">
					 <input class="form-submit" type="submit" name="post" value="Post">
				 </div>
			 </form>';
			
		?>		
	</body>
	
</html>