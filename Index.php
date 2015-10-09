<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
	</head>
	<body>
		<div class = "titlefont">
			<div class="textcentering">
				<h1>Simple Stack Exchange</h1>
			</div>
		</div>
		<form action="Submit.php" method="post">
			<div class="search">
				<input type="text" name="name"  class="form-textfield"></input>
				<input type="submit" value="Search">
			</div>
		</form>
		<div class ="textcentering">
			Cannot find what you are looking for? <a href="QuestionForm.php" id=linkstyle1>Ask here</a>
		</div>		
		<div class = "titlefont">
			<h3>Recently Asked Questions</h3>
		</div>
		<hr>
		<?php
			include 'qDBFunct.php';
			$Questions = getAllQuestion();
			if($Questions != null){
				foreach($Questions as $Question){
					echo '<br><div class="collection">
					<div class="compactbox">
						<div class="textcentering">
							<div class="voteansweridxstyle">
								<h1>'.$Question['qVote'].'</h1>Vote
							</div>
						</div>
					</div>
					<div class="compactbox">
						<div class="textcentering">
							<div class="voteansweridxstyle">
								belum diimplement 
							</div>
						</div>
					</div>
					<div class="compactbox">
						<div class="topicidxstyle">
							'. $Question['qTopic'].'
						</div>
					</div>
					<div class="choicebox">
						Asked by '. $Question['qName'].' | edit | delete </div>
					</div>
					<hr>';
				}
			}
		?>	
	</body>
</html> 