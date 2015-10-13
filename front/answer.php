<!DOCTYPE HTML>
<html>
 	<head>
		<title>Stack Exchange</title>
		<link rel="stylesheet" type="text/css" href="../css/answer.css">
		<script type = "text/javascript" src="../js/validateanswer.js"> </script>
  	</head>
  	<body>
		<div class="container">
			<h1 class="align-center margin-bot">Simple StackExchange</h1>
			<?php
				$conn = mysqli_connect("localhost","root","","stackExchange");
				// Check connection
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$currentq = $_GET["id"];
				$sqlquestion = "select * from question where question.QID = $currentq";
				$sqlanswer = "select * from answer where answer.QID = $currentq";
				$result = $conn->query($sqlquestion);
				$result2 = $conn->query($sqlanswer);
				$sumAns = mysqli_num_rows($result2);
				if ($result->num_rows > 0) {
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo'
							<h2>'.$row["Topic"].'</h2>
							<div class="devider">
								<div class="row">
									<div class="expanse10">
										<div id ="question-arrow-up"></div>
										<div class="align-center">
											<h2>'.$row["vote"].'</h2>
										</div>
										<div id = "question-arrow-down"></div>
									</div>
									<div>
										'.$row["Content"].'
									</div>
									<p class="align-right footer">
										asked by <blue>'.$row["Email"].'</blue> at '.$row["Date"].' | <a class ="text-link" href><orange>edit</orange></a> | <a class ="text-link" href><red>delete</red></a>
									</p>
								</div>
							</div>
						';
						echo '<h2>'.$sumAns.' Answer</h2>';
						while($row2 = $result2 -> fetch_assoc()){
							echo'
								<div class="devider">
									<div class="row">
										<div class="expanse10">
											<div class="arrow-up"></div>
											<div class="align-center">
												<h2>'.$row2["vote"].'</h2>
											</div>
											<div class="arrow-down"></div>
										</div>
										<div>
											'.$row2["Content"].'
										</div>											<p class="align-right footer">
											answered by <blue>'.$row2["Email"].'</blue> at '.$row2["Date"].'
										</p>
									</div>
								</div>
							';
						}
					}
				} else{
					echo "0 results";
				}
			?>
			<hr>
			<h1 class="left-margin"><grey>Your Answer<grey></h1>
		  	<?php
				echo'
					<form name="addAnswer" action="data-answer.php?id='.$currentq.'" onsubmit="return validateForm()" method="Post">
						<input type="text" class="form" placeholder="Name" name="Name">
						<input type="text" class="form" placeholder="Email" name="Email"> 
						<textarea class="form" placeholder="Content" rows="5" name="Content"></textarea>
						<div class="align-right">
							<button type="submit">Post</button>
						</div>
					</form>
				';
			?>
		</div>
  	</body>
</html>