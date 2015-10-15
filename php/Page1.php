<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="wbd.css">
		<title>
			Page 1 - TuCil WBD
		</title>
	</head>

	<body>
		
		<div class="font30 color-blue">
			<h1>
				Simple StackExchange
			</h1>
		</div>
		
		<form action="Page1.php" method="GET">
			<input class="form-textbox2" type="text" name="search">
			<input class="form-submit" type="submit" name="submit" value="Search">
		</form>
		
		<p class="font20">
			Cannot find what you are looking for ?
			<a class="no-text-decoration color-red" href="page2.php">Ask here</a><br><br>
		</p>
			
		<h2 class="font20 text-left">
			Recently Asked Question <br>
		</h2>
		
		
		<?php	

			define('dbName','SimpleStackExchange');
			define('dbUser','root');
			define('dbPass','');
			define('dbHost','localhost');

			// create connection
			$dbConn = new mysqli(dbHost, dbUser, dbPass, dbName);
			
			if ((isset($_GET['search'])) && (!is_null($_GET['search'])))
			{
				$query = "SELECT * FROM question
									WHERE
									(
										Topic LIKE '%$_GET[search]%'
										OR Question LIKE '%$_GET[search]%'
									)";
			}
			else
			{
				$query = "SELECT * FROM question ORDER BY QuestionID DESC";
				
			}
			
			// execute query
			$result = mysqli_query($dbConn,$query);
			
			if ($result->num_rows > 0)
			{
				while ($fetched = $result->fetch_assoc())
				{
					$query2 = "SELECT answers.AnswerID FROM answers WHERE answers.QuestionID=" . $fetched["QuestionID"];
					$result2 = mysqli_query ($dbConn,$query2);
					
					echo'			
					<div>
						<table>
							<hr>
								<tr>
									<td class="tdnumber text-center">' . $fetched["Vote"] . '<br><br>
										 Votes
									 </td>';
									 
									 
									$counted=0;
									
									if ($result2->num_rows>0)
									{
										while ($fetched2 = $result2->fetch_assoc())
										{
											$counted++;
										}
									}
									else
									{
										
									}
								echo"<td class='tdnumber text-center'> $counted <br><br>";
								echo'
										Answers
									 </td>
									 <td class="tdtopic no-text-decoration text-left">
										 <a href="Page3.php?id=' . $fetched["QuestionID"] . '">' . $fetched["Topic"] . '<br><br></a>';
										if (strlen($fetched["Question"])>88)
										{	
											 echo '<br>'. substr($fetched["Question"],0,88) . '...</br>';
										}
										else
										{
											 echo '<br>'. substr($fetched["Question"],0,88) . '</br>';
										}
								echo'
									 </td>
																	 
								</tr>
								<tr>
									<td colspan="3" class="text-right">
										 <p>
											 Asked by 
											 <span class="color-blue">' . $fetched["Name"] . '</span>
											  |
											 <a class="color-yellow" href="Page2.php?id=' . $fetched["QuestionID"] . '"> edit </a>
											  | 
											 <a class="color-red" href="deleteQuestion.php?id=' . $fetched["QuestionID"] . '"> delete </a>
										 </p>
								</tr>
							</hr>
						</table>
					</div>
					';
				}
			}
			else
			{
				echo '<span class="text-center color-red"><br>no question asked yet<br>be the first person to ask a question</span>';
			}
			// close connection
			mysqli_close($dbConn);
		?>	
	</body>

</html>